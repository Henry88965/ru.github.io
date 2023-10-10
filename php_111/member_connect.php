<?php
	#connect with Mysor
	$cons = mysqli_connect(
		'localhost',
		'henry',
		'Hh7016979'
	) or die("Fail to connect ! <br>");
	#2. connect with Database (member
	$db = "BUYBUY";
	if ( !mysqli_select_db($cons, $db)) {
	   echo "DB connect Fail <br>";
    }
	
?>