<?php


			$dbname = file_get_Contents('settings/dbase');
			$dbhost = file_get_Contents('settings/dbhost');
			$dbuser = file_get_Contents('settings/dbuser');
			$dbpass = file_get_Contents('settings/dbpass');
			
			
			$error = "Error connecting to database";
			$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			if(!$dbhandle) die ($error);

echo "
<html>
<head>
</head>
<body>
<form action='sparks.php' method='post'>

						<br><br>
						<table border='1' cellspacing='0' style='width:320px;'>
						<tr>
						<td style='background:violet;padding:5px;'>
						<center>Admin Home</center>
						</td>
						</tr>
						<tr>
						<td  style='background:aliceblue;padding:5px;'>
						<br><a href='tabloid.php'>View Tables</a>
						<br>
						<center>
						<select name='wattoadd'>
						<option>GROUP</option>
						<option>USER</option>
						</select>
						</center>
						<br>
						<hr/>
						<center>Group Name : 
						<input type='text' name='gname'>
						</center>
						<br><br>
						<center>Group Password : 
						<input type='text' name='gpass'>
						</center>												
						<br>
						<hr/>
						<center><h2>OR</h2></center>
						<br>
						<hr/>						
						<center>User Name : 
						<input type='text' name='uname'>
						</center>
						<br>
						
						<center>User Group : 						
 <select name='mygrp'>
";
			$res = mysqli_query($dbhandle,"SELECT * FROM GRPLIST");
			while($row = mysqli_fetch_array($res))
			{
				$temp = $row['NAME'];			
				
				echo "<option>$temp</option>";
			}
			
echo "
</select></center><br>						
						
						<center>User Password : 
						<input type='text' name='upass'>
						</center>																		
						<br>
						<hr/>
						<center><input type='submit' value='Add Element'></center>
						<br>
						</td>
						</tr>					
						</table>											

</form>
</body>
</head>
";

mysqli_close($dbhandle);
?>