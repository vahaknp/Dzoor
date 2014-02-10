<?php
	include 'get_server.php';
	if( $_REQUEST["ID"] && $_REQUEST["english"] && $_REQUEST["armenian"] && $_REQUEST["place"] && $_REQUEST["name"] && $_REQUEST["namearm"])
	{
		   $index = $_REQUEST['ID'];
		   $english = $_REQUEST["english"];
		   $armenian = $_REQUEST['armenian'];
		   $place = $_REQUEST['place'];
		   $name = $_REQUEST['name'];
		   $namearm = $_REQUEST['namearm'];
		   mysql_query("UPDATE posts SET Armenian='$armenian', English='$english', Place='$place', Name='$name', NameArm='$namearm' WHERE ID='$index'"); 
	}
?>