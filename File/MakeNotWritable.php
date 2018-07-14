<?php
function make_not_writable( $file ){
	// Returns true if the given file/dir has been made not writable
	$ret_val = false;
	if( is_file($file) || is_dir($file) ){
		if( !is_writable($file) ){
			$ret_val = true;
		}
		else {
			$original_fileperms = fileperms($file);

			// take away writable permissions
			$new_fileperms = $original_fileperms & ~0x0092;
			@sugar_chmod($file, $new_fileperms);

			if( !is_writable($file) ){
				$ret_val = true;
			}
		}
	}
	return $ret_val;
}
