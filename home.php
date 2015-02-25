<?php
$grp = $_COOKIE['GROOP'];
$user = $_COOKIE['NAMEX'];
$pass = $_COOKIE['PASSW'];
$gps = $_COOKIE['GPS'];


   Function CrypTo($intake)
   {
        $str = $intake;
        $str = str_replace(Chr(35), "#hash#", $str);
        $str = str_replace(Chr(36), "#dolr#", $str);
        $str = str_replace(Chr(37), "#perc#", $str);
        $str = str_replace(Chr(38), "#ampd#", $str);
        $str = str_replace(Chr(39), "#sngq#", $str);
        $str = str_replace(Chr(40), "#rouo#", $str);
        $str = str_replace(Chr(41), "#rouc#", $str);
        $str = str_replace(Chr(42), "#star#", $str);
        $str = str_replace(Chr(43), "#plus#", $str);
        $str = str_replace(Chr(44), "#coma#", $str);
        $str = str_replace(Chr(45), "#hife#", $str);
        $str = str_replace(Chr(46), "#perd#", $str);
        $str = str_replace(Chr(47), "#slsh#", $str);
        $str = str_replace(Chr(32), "#spce#", $str);
        $str = str_replace(Chr(33), "#excl#", $str);
        $str = str_replace(Chr(34), "#dobq#", $str);
        Return $str;
    }

    Function DecrypTo($intake)
	{
        $str = $intake;
        $str = str_replace("#hash#", Chr(35), $str);
        $str = str_replace("#dolr#", Chr(36), $str);
        $str = str_replace("#perc#", Chr(37), $str);
        $str = str_replace("#ampd#", Chr(38), $str);
        $str = str_replace("#sngq#", Chr(39), $str);
        $str = str_replace("#rouo#", Chr(40), $str);
        $str = str_replace("#rouc#", Chr(41), $str);
        $str = str_replace("#star#", Chr(42), $str);
        $str = str_replace("#plus#", Chr(43), $str);
        $str = str_replace("#coma#", Chr(44), $str);
        $str = str_replace("#hife#", Chr(45), $str);
        $str = str_replace("#perd#", Chr(46), $str);
        $str = str_replace("#slsh#", Chr(47), $str);
        $str = str_replace("#spce#", Chr(32), $str);
        $str = str_replace("#excl#", Chr(33), $str);
        $str = str_replace("#dobq#", Chr(34), $str);
        Return $str;
    }
	
//===========================================================

			$dbname = file_get_Contents('settings/dbase');
			$dbhost = file_get_Contents('settings/dbhost');
			$dbuser = file_get_Contents('settings/dbuser');
			$dbpass = file_get_Contents('settings/dbpass');
			
			
			$error = "Error connecting to database";
			$dbhandle = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			if(!$dbhandle) die ($error);
			
if(($grp != '') and ($user != '') and ($pass != '') and ($gps != ''))
{
			$res = mysqli_query($dbhandle,"SELECT * FROM GRPLIST WHERE NAME='$grp' AND PASSWORD='$gps' ");
			if($row = mysqli_fetch_array($res))
			{
			
				$result = mysqli_query($dbhandle,"SELECT * FROM USERS WHERE NAME='$user' AND PASS='$pass' ");
				if($rose  = mysqli_fetch_array($result))
				{
				echo "
						<html>
						<head>
						</head>
						<body bgcolor='lightyellow'>
						<br><br>
						<table border='1' cellspacing='0' style='width:320px;'>
						<tr>
						<td style='background:lightgreen;padding:5px;'>
						<center>Post new message</center>
						</td>
						</tr>
						<tr>
						<td  style='background:aliceblue;padding:5px;'>
						<form action='poster.php' method='post'>
						<input type='hidden' name='grptopost' value='$grp'>
						<input type='hidden' name='usrtopost' value='$user'>
						<center><textarea style='width:280px;height:100px;' name='txttopost'></textarea>
						</center>
						<br>
						<center><input type='submit' value='Post my message ...'></center>
						</form>
						</td>
						</tr>					
						</table>																	
				";
					$timm = mysqli_query($dbhandle,"SELECT * FROM $grp ORDER BY ID desc");
					while($roke  = mysqli_fetch_array($timm))				
					{
						$a = $roke['USER'];
						$b = $roke['TEXT'];
						$b = DecrypTo($b);
						
						echo "
						<br><br>
						<table border='1' cellspacing='0' style='width:320px;'>
						<tr>
						<td  style='background:lightblue;padding:5px;'>
						Message By : $a
						</td>
						</tr>
						<tr>
						<td  style='background:aliceblue;padding:5px;'>
						$b
						</td>
						</tr>					
						</table>
						";
					}
					echo "
						<br><br>
						<table border='1' cellspacing='0' style='width:320px;'>
						<tr>
						<td style='background:violet;padding:5px;'>
						<center>Options</center>
						</td>
						</tr>
						<tr>
						<td  style='background:aliceblue;padding:5px;'>
						<form action='clearmaster.php' method='post'>
						<input type='hidden' name='grptoclr' value='$grp'>
						<center><input type='submit' value='Clear Conversation'></center>
						</form>
						<center><a href='logout.php'> Logout </a></center>
						</td>
						</tr>					
						</table>											
						</body>
						</html>					
					";
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
			
}
else
{
	header('location:http://www.google.com');
}
mysqli_close($dbhandle);			
?>