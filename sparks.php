<?php
			$addtyp = $_POST['wattoadd'];	
			$dbname = file_get_Contents('settings/dbase');
			$dbhost = file_get_Contents('settings/dbhost');
			$dbuser = file_get_Contents('settings/dbuser');
			$dbpass = file_get_Contents('settings/dbpass');
			
			
			$error = "Error connecting to database";
			$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			if(!$dbhandle) die ($error);
			
			if($addtyp == 'GROUP')
			{
				$grp = $_POST['gname'];
				$gps = $_POST['gpass'];
				if($grp != '' and $gps != '')
				{
					if(mysqli_query($dbhandle,"INSERT into GRPLIST VALUES ('$grp','$gps')"))
					{
						
						$qry = "CREATE TABLE $grp(ID TEXT, USER TEXT," .
						"TEXT TEXT)";		
						
						if(mysqli_query($dbhandle,$qry))
						{				
							header('location:robosoft.php');
						}
					}				
				}
			}
			else if($addtyp == 'USER')
			{
				$uname = $_POST['uname'];
				$mygrp = $_POST['mygrp'];			
				$upass = $_POST['upass'];	
				if($uname != '' and $mygrp != '' and $upass != '')				
				{
					if(mysqli_query($dbhandle,"INSERT into USERS VALUES ('$uname','$upass','$mygrp')"))
					{
						header('location:robosoft.php');
					}				
				}
			}
			
			mysqli_close($dbhandle);						
?>			