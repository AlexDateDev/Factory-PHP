<?php
// ----------------------------------------------------------------------------
// HttpSocket_class
//
// Date : 10/05/2012
// By   : Àlex Solé
// In    : Atexsa
// ----------------------------------------------------------------------------
?>


<?php

require_once('HTTPsock.class.php');

$socket = new HTTPSock();

/* Simple GET */
echo $socket->HTTPRequest("GET", "http://www.google.com/");

/* Advanced POST, use array's for overwriting header values and using POST variables */
$header = array("Referer" => "http://www.google.com");
echo $socket->HTTPRequest("POST", "www.google.com/someform.phtml", array("somevar" => "somevalue"), $header);

/* Returns the a cookie with the name 'somecookie' */
echo $socket->cookies['somecookie'];

/* Returns what the content was encoded in */
echo $socket->headers['Content-Encoding'];

?>


<?php

/**
* Class for sending HTTP Requests using raw sockets
*
* This class compiles HTTP Requests and use's raw sockets
* to interact with the given server. Upon recieving data
* it uses RegEx to parse the header information and any
* given cookie data.
*
* @author Joshua Gilman
* @package HTTPSock
*/
class HTTPSock
{
    public $error = array();
    public $last_error = NULL;

    public $headers = array();
    public $cookie = NULL;
    public $cookies = NULL;

    private $socket = NULL;
    private $host = NULL;
    private $numerical_host = NULL;
    private $path = NULL;
    private $port = NULL;

    private $header = NULL;
    private $content = NULL;

    protected $newline = "\r\n";
    protected $connection = "tcp";
    protected $service = "www";

    /**
    * Sends an HTTP Request and returns the content
    *
    * This function will send an HTTP Request using the specified
    * url as you would a web browser. A type ("GET" or "POST") and
    * a valid URL is mandatory. Upon recieving a response it will
    * remove and parse the headers and return the content.
    *
    * @var String $HTTP_TYPE
    * @var String $webURL
    * @var Mixed $HTTPPostVars
    * @var Mixed $headers
    *
    * @return String The returned HTTP response with stripped header
    */
    public function HTTPRequest($HTTP_Type, $webURL, $HTTPPostVars = array(), $headers = array())
    {
        $this->new_socket();

        list($host, $path) = $this->url_details($webURL);

        $this->host = $host;
        $this->numerical_host = $this->get_numerical_host();
        $this->path = $path;
        $this->port = $this->get_port();

        $this->connect($this->host, $this->port);

        $header = $this->assemble_header($HTTP_Type, $this->host, $this->path, $HTTPPostVars, $headers);

        socket_write($this->socket, $header, strlen($header));

        $this->read_socket();
        $this->parse_header();

        if ($this->headers['Content-Encoding'] == "gzip")
        {
            $this->content = gzinflate(substr($this->content, 10));
        }

        return $this->content;
    }

    /**
    * Logs an error and throws an exception
    *
    * This function uses an error string to log an error
    * and throw a new exception. When using this class
    * always include it in a try/catch statement.
    *
    * @var String $error_string
    */
    private function new_error($error_string)
    {
        $this->error[] = $error_string;
        $this->last_error = $error_string;

        throw new Exception("Socket Error: " . $error_string);
    }

    /**
    * Creates a new TCP socket using some default values
    *
    * This function creates and sets the class socket to
    * be used when sending and reading data from and to
    * the socket stream.
    */
    private function new_socket()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if (!$this->socket)
        {
            $this->new_error(socket_strerror($this->socket));
        }
    }

    /**
    * Returns the default service port for the requested service
    *
    * This function uses the assigned settings for the service
    * and connection type to grab the default port for the settings
    *
    * @return Integer
    */
    private function get_port()
    {
        return $service_port = getservbyname($this->service, $this->connection);
    }

    /**
    * Returns the IP of the given host name
    *
    * This function takes a host name and returns the
    * numerical IP related to the host name.
    *
    * @return String
    */
    private function get_numerical_host()
    {
        return gethostbyname($this->host);
    }

    /**
    * Connects the already created class socket
    *
    * This function connects the socket using the
    * already set host and port details. Throws an
    * exception when the connection fails.
    */
    private function connect()
    {
        if (!($result = socket_connect($this->socket, $this->numerical_host, $this->port)))
        {
            $this->new_error(socket_strerror($result));
        }
    }

    /**
    * Assembles an HTTP Header
    *
    * This function is used to create an HTTP Header using
    * some minor details. Default values are given to the
    * common HTTP values but can be overriden by refferencing
    * them in the $headers variable.
    *
    * @param String $HTTP_Type
    * @param String $host
    * @param String $path
    * @param Mixed $HTTPPostVars
    * @param Mixed $headers
    *
    * @return String
    */
    private function assemble_header($HTTP_Type, $host, $path, $HTTPPostVars, $headers)
    {
        $HTTP_Type = strtoupper($HTTP_Type);

        $header = "{$HTTP_Type} {$path} HTTP/1.1\r\n";
        $header .= "Host: " . $host . "\r\n";

        $params['User-Agent'] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
        $params['Accept'] = "text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
        $params['Accept-Language'] = "en-us,en;q=0.5";
        $params['Accept-Encoding'] = "gzip,deflate";
        $params['Accept-Charset'] = "ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $params['Keep-Alive'] = "300";
        $params['Connection'] = "Close";

        if (sizeof($headers) >= 1)
        {
            $params = array_merge($params, $headers);
        }

        foreach ($params as $key => $value)
        {
            $header .= "{$key}: {$value}\r\n";
        }

        if (!empty($this->cookie))
        {
            $header .= "Cookie: " . $this->cookie . "\r\n";
        } elseif (sizeof($this->cookies >= 1)) {
            foreach ($this->cookies as $key => $value)
            {
                $cookie_str .= "$key=$value;";
            }

            $header .= "Cookie: " . $cookie_str . "\r\n";
        }

        if ($HTTP_Type == "POST")
        {
            foreach ($HTTPPostVars as $key => $value)
            {
                $key = urlencode($key);
                $value = urlencode($value);

                $postData .= "{$key}={$value}&";
            }

            $postData = substr($postData, 0, strlen($postData) - 1);

            $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
            $header .= "Content-Length: " . strlen($postData) . "\r\n\r\n";
            $header .= $postData;
        } else {
            $header .= "\r\n";
        }

        return $header;
    }

    /**
    * Parses the returned HTTP Header
    *
    * This function parses the returned HTTP Header into
    * logical parts using an array. Each value is parsed
    * and loaded into the $headers array
    */
    private function parse_header()
    {
        $parts = split($this->newline . $this->newline, $this->content);

        $this->header = array_shift($parts);
        $this->content = implode($parts, $this->newline . $this->newline);

        $parts = split($this->newline, $this->header);
        foreach ($parts as $part)
        {
            if (preg_match("/(.*)\: (.*)/", $part, $matches))
            {
                $this->headers[$matches[1]] = $matches[2];
            }
        }

        if (eregi("Set-Cookie", $this->header))
        {
            $this->parse_cookies();
        }
    }

    /**
    * Parses the cookies from the HTTP Header
    *
    * This function uses RegEx to parse all cookies
    * from the HTTP header and load them into an
    * associative array with the cookie name as the
    * key and the cookie value as the value
    */
    private function parse_cookies()
    {
        $lines = split($this->newline, $this->header);

        foreach ($lines as $line)
        {
            if (preg_match("/Set-Cookie: (.+?)=(.+?);/", $line, $matches))
            {
                $this->cookies[$matches[1]] = $matches[2];
            }
        }
    }

    /**
    * Reads all data from the socket
    *
    * This reads all the returned data off of
    * the socket stream and returns it in one
    * string
    *
    * @return String
    */
    private function read_socket()
    {
        while ($buffer = socket_read($this->socket, 2048))
        {
             $this->content .= $buffer;
        }

        socket_close($this->socket);
        return $this->content;
    }

    /**
    * Parses a URL into a host and a path
    *
    * This function uses RegEx to parse the host
    * and the path from a URL. Returns the host
    * and path in an array.
    *
    * @param String $url
    *
    * @return Mixed
    */
    private function url_details($url)
    {
        $url = str_replace("http://", "", $url);
        $host = preg_replace("/\/.*/", "", $url);
        $path = str_replace($host, "", $url);

        return array($host, $path);
    }
}


?>


