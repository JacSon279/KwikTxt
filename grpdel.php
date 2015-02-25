<?php


			$dbname = file_get_Contents('settings/dbase');
			$dbhost = file_get_Contents('settings/dbhost');
			$dbuser = file_get_Contents('settings/dbuser');
			$dbpass = file_get_Contents('settings/dbpass');
			
			
			$error = "Error connecting to database";
			$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			if(!$dbhandle) die ($error);
			
$x = $_POST['grptodel'];
foreach($x as $item)
{
	mysqli_query($dbhandle,"DELETE from grplist WHERE NAME = '$item' ");
	mysqli_query($dbhandle,"DROP table $item ");
}
mysqli_query($dbhandle,"DELETE from users WHERE COOP = '$item' ");

			mysqli_close($dbhandle);	
			header('location:tabloid.php');
?>