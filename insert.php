<?php
	include 'get_server.php';
	if( $_REQUEST["english"] && $_REQUEST["armenian"] && $_REQUEST["engName"] && $_REQUEST["armName"] && $_REQUEST["location"])
	{
		   $english = $_REQUEST['english'];
		   $armenian = $_REQUEST['armenian'];
		   $engName = $_REQUEST['engName'];
		   $armName = $_REQUEST['armName'];
		   $location = $_REQUEST['location'];
		   mysql_query("INSERT INTO posts (Armenian, English, Place, Name, Date, NameArm) VALUES ('$armenian','$english','$location','$engName', NOW(), '$armName')"); 
	}
?>