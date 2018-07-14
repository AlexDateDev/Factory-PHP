<?php

/**
 * Function to split up large files for download
 * used in download.php
 * @param string $filename
 * @param int $retbytes
 */
function readfile_chunked($filename,$retbytes=true)
{
   	$chunksize = 1*(1024*1024); // how many bytes per chunk
	$buffer = '';
	$cnt = 0;
	$handle = sugar_fopen($filename, 'rb');
	if ($handle === false)
	{
	    return false;
	}
	while (!feof($handle))
	{
	    $buffer = fread($handle, $chunksize);
	    echo $buffer;
	    flush();
	    if ($retbytes)
	    {
	        $cnt += strlen($buffer);
	    }
	}
	    $status = fclose($handle);
	if ($retbytes && $status)
	{
	    return $cnt; // return num. bytes delivered like readfile() does.
	}
	return $status;
}