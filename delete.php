<?php
	include 'get_server.php';
	if( $_REQUEST["ID"])
	{
		   $index = $_REQUEST['ID'];
		   echo "Updated.";
		   mysql_query("DELETE FROM posts WHERE ID='$index'"); 
	}
?>