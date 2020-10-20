<?php
include'inc/user.php';
$db=new user();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>File Handling</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container text-center bg-light" id="body">
		<section id="header" class="bg-primary text-light text-center mt-3 p-2">
			<h2>Uploading and Download file</h2>
		</section>
		<section id="main">
			<div class="myform mt-4">
	<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	$name      = $_POST['name'];
    $permited  = array('pdf');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div       = explode(".",$file_name);
    $file_ext  = strtolower(end($div));
    $unique_nm = substr(md5(time()),0,10).".".$file_ext;
    $upload = "uploads/".$unique_nm;
    if(empty($file_name))
    {
      echo "<span class='text-danger pb-4 h2'>Please select a File!</span>";        
    }
	else if(empty($name))
    {
      echo "<span class='text-danger pb-2 h2'>Please give a File name!</span>";        
    }
    elseif($file_size>10485670000)
    {
       echo "<span class='text-danger pb-5 h2'>File Size is too large!</span>";               
    }
    elseif(in_array($file_ext,$permited)==false)
    {
       echo "<span class='text-danger h2'>you can upload a file only type:-".implode(',',$permited).
           "</span>";              
    }
    else
    {
		if(move_uploaded_file($file_temp,$upload)){
		$query = "INSERT INTO tbl_pdf(pdf_folder,pdf_name,pdf_content) VALUES('$upload','$name','$file_name')";
		$inserted_rows = $db->insert($query);
		if ($inserted_rows)
		{
		   echo "<span class='text-success h2'>File inserted successfully.
			  </span>";
		}
		else
		{
		  echo "<span class='text-danger h2'>Pdf Not Inserted !</span>";
		}
		}
		}
	}
    ?>
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td>Select File to Upload</td>
							<td><input type="text" name="name" placeholder="Enter a name of file"></td>
							<td><input type="file" name="image"></td>
							<td><input type="submit" class="btn btn-primary" name="submit" value="Upload"></td>
						</tr>
					</table>
				</form>
				<hr>
				<table class="table table-border ">
					<tr>
						<th>Name:</th>
						<th>Content:</th>
						<th>Folder:</th>
						<th>Upload Time:</th>
						<th>Action:</th>
					</tr>
					<?php 
					$sql    = "select * from tbl_pdf";
					$result = $db->select($sql);
					if($result){
						foreach($result as $data){
					?>
					<tr>
						<td><?php echo $data['pdf_name'];?></td>
						<td><?php echo $data['pdf_content'];?></td>
						<td><?php echo $data['pdf_folder'];?></td>
						<td><?php echo $data['timeStore'];?></td>
						<td><a href="download.php?name=<?php echo $data['pdf_folder'];?>" class="btn btn-primary">Download</a> <a href="edit.php?file=<?php echo $data['pdf_folder'];?>" class="btn btn-success">Read</a> <a href="delete.php?delid=<?php echo $data['id'];?>" class="btn btn-danger">Delete</a></td>
					</tr>
					<?php } }?>

				</table>

			</div>
		</section>
	</div>
	<div class="container">
	<section id="footer" class="bg-primary text-light text-center p-2">
			<h2>&copy; Persional pdf store</h2>
	</section>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-slim.min.js"></script>
	<script src="../js/popper.min.js"></script>
	</div>
</body>

</html>
