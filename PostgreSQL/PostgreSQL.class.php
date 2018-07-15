<?php
// ----------------------------------------------------------------------------
// PostgreSQL_class
//
// Date : 10/05/2012
// ----------------------------------------------------------------------------

/*
  Implemented by Sandro Alves Peres
  sandrinhodobanjo@yahoo.com.br
*/

class PostgreSQL{

  private $con;
  private $fixCon;
  private $param;
  private $openCon;
  private $querySql;

  public function __construct(){
    $this->con = array(
       array("localhost", "5432", "postgres", "1255", "doidao")
    );
    $this->fixCon   = NULL;
    $this->param    = array();
    $this->openCon  = NULL;
    $this->querySql = NULL;
    $this->setConnection(0);
  }

  public function setParam( $index, $value ){
    $this->param[$index] = $value;
  }

  public function getParam( $index ){
    return $this->param[$index];
  }

  public function setConnection( $index ){
    $this->fixCon = array();
    for($i=0; $i < 4; $i++):
      array_push($this->fixCon, $this->con[$index][$i]);
    endfor;
  }

  public function open(){
    $host = $this->fixCon[0];
    $port = $this->fixCon[1];
    $user = $this->fixCon[2];
    $pass = $this->fixCon[3];
    $base = $this->fixCon[4];

    @$this->openCon = pg_connect("host={$host} port={$port} dbname={$base} user={$user} password={$pass}");

    if(! $this->openCon){
      throw new Exception("Erro ao conectar com banco de dados!!!");
      $this->close();
      exit;
    }
  }

  public function close(){
    @pg_free_result($this->querySql);
    @pg_close($this->openCon);
  }

  public function query( $strQuery ){
    $this->querySql = pg_query($this->openCon, $strQuery);
    return $this->querySql;
  }

  public function result( $row, $col ){
    return pg_fetch_result($this->querySql, $row, $col);
  }

  public function lines(){
    return pg_num_rows($this->querySql);
  }

  public function fields(){
    return pg_num_fields($this->querySql);
  }

  public function affecteds(){
    return pg_affected_rows($this->querySql);
  }

  public function begin(){
    return $this->query("BEGIN WORK");
  }

  public function rollback(){
    return $this->query("ROLLBACK WORK");
  }

  public function commit(){
    return $this->query("COMMIT WORK");
  }

} # end class PostgreSQL
?>


