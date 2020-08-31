<!DOCTYPE html>
<html>
<head>
	<title>Upload images</title>
	<style type="text/css">
		body{
			background-color: lightblue;
		}
		input{
			width: 50%;
			height: 5%;
			border: 1px;
			border-radius: 05%;
			padding: 8px 15px 8px 15px;
			margin: 10px 0px 15px 0px;
			box-shadow: 1px 1px 2px 1px grey;
			font-weight: bold; 
		}
	</style>
</head>
<body>
	<center>
		<h1>Upload and store different images to MySQL database</h1>
		<form action="" method="POST" enctype="multipart/form-data">
		
		<label>Choose an image:</label><br>
		<input type="file" name="image" id="image"><br>	

		<label>Enter username:</label><br>
		<input type="text" name="username" placeholder="Enter your userName"><br>	
		
		<input type="submit" name="upload" value="Upload Image"><br>	
		</form>
	</center>

</body>
</html>

<?php
 $connection = mysqli_connect("localhost", "root", "");
 $db = mysqli_select_db($connection,'uploadstoreimage'); 

 if (isset($_POST['Upload'])) {
 	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

 	$username = $_POST["username"];

 	$query = "INSERT INTO 'myimage'('image','username') value('$file','$username')";

 	$query_run = mysqli_query($connection,$query);

 	if ($query_run) 
     	{
 		  echo '<script type="text/javascrip"> alert("Image uploaded successfully") </script';
        }
    else 
 		{
 			echo '<script type="text/javascrip"> alert("Image not uploaded") </script';
 		}
 }
 ?>