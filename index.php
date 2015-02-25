<?php
			//opening sqlite db
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
<form action='loginprocess.php' method='post'>
<div style='width:320px;height:35px;background:navy;border-radius:15px;'>
<h1 style='color:white;font-family:sans-serif;'><center>KwikTxt</center></h1>
</div>
<div style='width:320px;height:300px;background:lightblue;border-radius:15px;border:solid 2px navy;'>
<br><br>
<center>Group &#160 &#160 &#160 :  <select name='grpname'>
";
			$res = mysqli_query($dbhandle,"SELECT * FROM GRPLIST");
			while($row = mysqli_fetch_array($res))
			{
				$temp = $row['NAME'];			
				
				echo "<option>$temp</option>";
			}
			
echo "
</select><center>
<br><br>
<center>User Name : 
<input type='text' name='muser' required>
</center>
<br><br>
<center>User Password : 
<input type='password' name='mpass' required>
</center>
<br><br>
<center>Group Password : 
<input type='password' name='gpass' required>
</center>
<br><br>
<center>
<input type='submit' value='login'>
</center>
</form>
</div>
</body>
</html>
";


mysqli_close($dbhandle);
?>