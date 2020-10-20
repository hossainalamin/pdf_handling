<?php 
if(!empty($_GET['name']))
{
	$filename = basename($_GET['name']);
	$filepath = 'uploads/' . $filename;
	if(!empty($filename) && file_exists($filepath)){
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");
		readfile($filepath);
		exit;

	}
	else{
		echo "This File Does not exist.";
	}
}

 ?>