<?php

			$dbname = file_get_Contents('settings/dbase');
			$dbhost = file_get_Contents('settings/dbhost');
			$dbuser = file_get_Contents('settings/dbuser');
			$dbpass = file_get_Contents('settings/dbpass');
			
			
			$error = "Error connecting to database";
			$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			if(!$dbhandle) die ($error);
			
			$target = $_POST['grptoclr'];
			if(mysqli_query($dbhandle,"DELETE FROM $target"))
			{
				header('location:home.php');
			}
			mysqli_close($dbhandle);						
?>			