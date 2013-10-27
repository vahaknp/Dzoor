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
						<%= obj.Live %>
						<button id='live' class='subbutt' id_number = <%= obj.ID%>>Live</button>
						<button id='kill' class='subbutt' id_number = <%= obj.ID%>>Kill</button>
						<button id='delete' class='subbutt' id_number = <%= obj.ID%>>Delete</button>
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