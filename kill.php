<?php
	include 'get_server.php';
	if( $_REQUEST["ID"])
	{
		   $index = $_REQUEST['ID'];
		   mysql_query("UPDATE posts SET Live=0 WHERE ID='$index'"); 
	}
?>