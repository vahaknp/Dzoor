<?php
	include 'get_server.php';
	if( $_REQUEST["english"] && $_REQUEST["armenian"] && $_REQUEST["name"] && $_REQUEST["location"])
	{
		   $english = $_REQUEST['english'];
		   $armenian = $_REQUEST['armenian'];
		   $name = $_REQUEST['name'];
		   $location = $_REQUEST['location'];
		   mysql_query("INSERT INTO posts (Armenian, English, Place, Name, Date) VALUES ('$armenian','$english','$location','$name', NOW())"); 
	}
?>