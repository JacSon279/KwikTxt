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
			
			$target = $_POST['grptopost'];
			$person = $_POST['usrtopost'];
			$wordings = $_POST['txttopost'];
			$wordings = CrypTo($wordings);
			$wordings = nl2br($wordings);
			
			$resh = mysqli_query($dbhandle,"SELECT * FROM $grp");
			$srno = mysqli_num_rows($resh);
			$srno = $srno + 1;
			if(mysqli_query($dbhandle,"INSERT into $target VALUES ('$srno','$person','$wordings')"))
			{
				header('location:home.php');
			}
			mysqli_close($dbhandle);						
?>			