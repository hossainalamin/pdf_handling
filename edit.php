<?php
if(isset($_GET['file'])){
	$file =  $_GET['file'];
}
$myfile = $file;
header('Content-type: application/pdf');
header('Content-Description: inline;filename="'.$myfile.'"');
header('Content-Transfer-Emcoding:binary');
header('Accept-Ranges: bytes');
@readfile($myfile);
?>