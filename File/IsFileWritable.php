<?php
// ----------------------------------------------------------------------------
// isFileWritable
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
 * Indica si es pot escriure a l'arxiu, no es necessari que estigui obert
 *
 * @return bool
 */
static function is_writable_file($sFileName)
{
    return is_writable($sFileName);
}

/**
 * equivalent for windows filesystem for PHP's is_writable()
 * @param string file Full path to the file/dir
 * @return bool true if writable
 */
function is_writable_windows($file) {
	if($file{strlen($file)-1}=='/') {
		return is_writable_windows($file.uniqid(mt_rand()).'.tmp');
	}

	// the assumption here is that Windows has an inherited permissions scheme
	// any file that is a descendant of an unwritable directory will inherit
	// that property and will trigger a failure below.
	if(is_dir($file)) {
		return true;
	}

	$file = str_replace("/", '\\', $file);

	if(file_exists($file)) {
		if (!($f = @sugar_fopen($file, 'r+')))
		return false;
		fclose($f);
		return true;
	}

	if(!($f = @sugar_fopen($file, 'w')))
	return false;
	fclose($f);
	unlink($file);
	return true;
}
?>
                    