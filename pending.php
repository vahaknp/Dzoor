<html>
	<head>
		<? include ('get_server.php') ?>
		<link rel="stylesheet" type="text/css" href="dzoor.css" media="screen" />
		<script type="application/javascript">
		    var array = <? echo json_encode($dServer); ?>;
		    console.log(array);
		</script>
	</head>
	<body onload="on_load2()">
		<p>TESTING YO YO</p>

		<div id="pending">
			<script id="posts" type="text/html">
				<% _.each(array, function(obj){ %>
					<div class="pend"> 
						<%= obj.ID %>
						<%= obj.Armenian %>
						<%= obj.English %>
						<%= obj.Place %>
						<%= obj.Name %>
						<%= obj.NameArm %>
						<%= obj.Date %>
						<%= obj.Votes %>
						<button id='update' class='subbutt' id_number = <%= obj.ID%>>Update</button>
					</div>
				<% }); %>
			</script>
		</div>

		<div id="test">
		</div>

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="http://underscorejs.org/underscore-min.js"></script>
        <script type="text/javascript" src="app.js"></script>
	</body>
</html>