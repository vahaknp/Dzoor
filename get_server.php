<!DOCTYPE html>
<html>
	<head>
		<title>Dzoor PHP</title>
		<? header('Content-type: application/javascript'); ?>
	</head>
	<body>
		<?	
			$user_name = "myshutka";
			$password = "Vahakn1 Souren2";
			$database = "myshutka_dzoor";
			$server = "127.0.0.1";
			$db_handle = mysql_connect($server, $user_name, $password);
			$db_found = mysql_select_db($database, $db_handle);

			if ($db_found) {
				
				$SQL = "SELECT * FROM posts";
				$result = mysql_query($SQL);

				while($row = mysql_fetch_assoc($result)){
				    $dServer[] = $row;
				}    

			}
			
			else {
				print "Database NOT Found";
				mysql_close($db_handle);
			}

		?>
		</script>
	</body>
</html>