<?php
	include 'get_server.php';
	if( $_REQUEST["ID"])
	{
		   $index = $_REQUEST['ID'];
		   mysql_query("UPDATE posts SET Votes = Votes + 1 WHERE ID='$index'"); 
	}
?>