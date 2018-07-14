<?php
// ----------------------------------------------------------------------------
// Cargar una imagen aleatoria
//
//
//
// Date : 05/11/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

En un archivo CSS

#header {
    background: url("/images/headerimgs/rotate.php")
no-repeat bottom center; }

En una página p html con ina imagen
To actually put this in your header, or elsewhere on your site, add an image link like this within the header division:

<img src="/images/headerimgs/rotate.php" alt="A Random Header Image" />

rotate.php
<?php
/*
By Matt Mullenweg > http://photomatt.net
Inspired by Dan Benjamin > http://hiveware.com/imagerotator.php
Latest version always at:

http://photomatt.net/scripts/randomimage
                                   
*/// Make this the relative path to the images, like "../img" or "random/images/".
// If the images are in the same directory, leave it blank.
$folder = '';

// Space seperated list of extensions, you probably won't have to change this.
$exts = 'jpg jpeg png gif';

$files = array(); $i = -1; // Initialize some variables
if ('' == $folder) $folder = './';

$handle = opendir($folder);
$exts = explode(' ', $exts);
while (false !== ($file = readdir($handle))) {
    foreach($exts as $ext) { // for each extension check the extension
        if (preg_match('/\.'.$ext.'$/i', $file, $test)) { // faster than ereg, case insensitive
            $files[] = $file; // it's good
            ++$i;
        }
    }
}

closedir($handle); / We're not using it anymore
mt_srand((double)microtime()*1000000); // seed for PHP < 4.2
$rand = mt_rand(0, $i); // $i was incremented as we went along

header('Location: '.$folder.$files[$rand]); // Voila!
?>
