<?php
					setcookie("GPS", '', time()+60*60*24*30*12);
					setcookie("GROOP", '', time()+60*60*24*30*12);
					setcookie("NAMEX", '', time()+60*60*24*30*12);
					setcookie("PASSW", '', time()+60*60*24*30*12);
					echo "
					<center>
					Logged out successfully<br>
					<a href='index.php'>Login Again ...</a>
					</center>
					";
?>