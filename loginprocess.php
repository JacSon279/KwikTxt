<?php

$grp = $_POST['grpname'];
$user = $_POST['muser'];
$pass = $_POST['mpass'];
$gps = $_POST['gpass'];

			$dbname = file_get_Contents('settings/dbase');
			$dbhost = file_get_Contents('settings/dbhost');
			$dbuser = file_get_Contents('settings/dbuser');
			$dbpass = file_get_Contents('settings/dbpass');
			
			
			$error = "Error connecting to database";
			$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			if(!$dbhandle) die ($error);

			$res = mysqli_query($dbhandle,"SELECT * FROM GRPLIST WHERE NAME='$grp' AND PASSWORD='$gps' ");
			if($row = mysqli_fetch_array($res))
			{
				$resu = mysqli_query($dbhandle,"SELECT * FROM USERS WHERE COOP = '$grp' AND NAME='$user' AND PASS='$pass' ");
				if($rowt = mysqli_fetch_array($resu))
				{			
					setcookie("GPS", $gps, time()+60*60*24*30*12);
					setcookie("GROOP", $grp, time()+60*60*24*30*12);
					setcookie("NAMEX", $user, time()+60*60*24*30*12);
					setcookie("PASSW", $pass, time()+60*60*24*30*12);
					header('location:home.php');
				}
				else
				{
					header('location:http://www.google.com');
				}
			}
			else
			{
				header('location:http://www.google.com');
			}

mysqli_close($dbhandle);
			
?>