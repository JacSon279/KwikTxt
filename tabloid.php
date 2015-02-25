<?php
			$addtyp = $_POST['wattoadd'];	
			$dbname = file_get_Contents('settings/dbase');
			$dbhost = file_get_Contents('settings/dbhost');
			$dbuser = file_get_Contents('settings/dbuser');
			$dbpass = file_get_Contents('settings/dbpass');
			
			
			$error = "Error connecting to database";
			$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			if(!$dbhandle) die ($error);
			
			echo "
			<br>
			<h1>User List</h1>
			<form action='usrdel.php' method='POST'>
			<table border='1' cellspacing = '0'>
			<tr>
			<th>
			Select
			</th>			
			<th>
			Name
			</th>
			<th>
			Password
			</th>
			<th>
			Group
			</th>			
			</tr>
			";
			$resu = mysqli_query($dbhandle,"SELECT * FROM USERS");			
			while($ro = mysqli_fetch_array($resu))
			{
				$n = $ro['NAME'];
				$p = $ro['PASS'];
				$c = $ro['COOP'];
				echo "
				<tr>
				<td>
				<input type='checkbox' value='$n' name='usrtodel[]'>
				</td>				
				<td>
				$n
				</td>
				<td>
				$p
				</td>
				<td>
				$c
				</td>				
				</tr>
				";
			}
			
			echo "
			</table>
			<br>
			<input type='submit' value='Delete Selected Users' >
			</form>
			<br>
			<h1>Group List</h1>
			<form action='grpdel.php' method='POST'>			
			<table border='1' cellspacing = '0'>
			<tr>
			<th>
			Select
			</th>						
			<th>
			Name
			</th>
			<th>
			Password
			</th>
			</tr>
			";
			$resume = mysqli_query($dbhandle,"SELECT * FROM GRPLIST");			
			while($rox = mysqli_fetch_array($resume))
			{
				$x = $rox['NAME'];
				$y = $rox['PASSWORD'];

				echo "
				<tr>
				<td>
				<input type='checkbox' value='$x' name='grptodel[]'>
				</td>								
				<td>
				$x
				</td>
				<td>
				$y
				</td>
				</tr>
				";
			}
			
			echo "
			</table>
			<br>
			<input type='submit' value='Delete Selected Groups' >
			<br>
			<br>
			<a href='robosoft.php'>Back to Admin</a>
			";
			mysqli_close($dbhandle);				
?>