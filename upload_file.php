<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload File Center</title>
</head>
<body>
<?php
/*This script displays and handles HTML form. This script takes a file upload and stores it on the server. */

//handle form
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//try to move the uploaded file
	if (move_uploaded_file ($_FILES['the_file']['tmp_name'], "./uploads/{$_FILES['the_file']['name']}")){
		print '<p>Your file has been uploaded.</p>';
	} else { //problem!
		print '<p style="color:read;">Your file couldn not be uploaded because: ';
		
		//print a message based upon the error:
		
		switch ($_FILES['the_file']['error']){
			case 1:
				print 'The file exceeds the upload_max_filesize setting in the php.ini';
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
				break;
			case 3:
				print 'The file was only partially uploaded';
				break;
			case 4:
				print 'No file was uploaded';
				break;
			case 6:
				print 'The temporary folder does not exist.';
				break;
			default:
				print 'Something unforeseen happened.';
				break;
		}
		print '.</p>';
	}
}
?>

<form action="upload_file.php" enctype="multipart/form-data" method="post">
	<p> Upload a file using this form:</p>
	<input type="hidden" name="MAX_FILE_SIZE" value="300000">
	<p><input type="file" name="the_file"></p>
	<p><input type="submit" name="submit" value="Upload this file"></p>
</form>
</body>
</html>