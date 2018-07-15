<?php

$filename = "filename.zip";
$pdf = "document.pdf";
echo system("zip -P 1234 -j $filename \"$pdf\"");

