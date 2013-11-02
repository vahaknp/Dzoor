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
		<div id="page">	
			<p>TESTING YO YO</p>
			<div id="pending">
				<script id="posts" type="text/html">
					<% _.each(array, function(obj){ %>
						<div class="pend"> 
							ID: <%= obj.ID %> Date: <%= obj.Date %> Votes: <%= obj.Votes %> Live: <%= obj.Live %><br>
							Armenian: <input type='text' class='pendbox1' id='Armenian' value='<%= obj.Armenian %>'><br>
							English: <input type='text' class='pendbox1' id='English' value='<%= obj.English %>'><br>
							<input type='text' id='Place' value='<%= obj.Place %>'>
							<input type='text' id='Name' value='<%= obj.Name %>'>
							<input type='text' id='NameArm' value='<%= obj.NameArm %>'>
							<br>
							<button id='live' class='subbutt' id_number = <%= obj.ID%>>Live</button>
							<button id='kill' class='subbutt' id_number = <%= obj.ID%>>Kill</button>
							<button id='delete' class='subbutt' id_number = <%= obj.ID%>>Delete</button>
							<button id='edit' class='subbutt' id_number = <%= obj.ID%>>Edit</button>
						</div>
					<% }); %>
				</script>
			</div>

			<div id="test">
			</div>
		</div>

		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="http://underscorejs.org/underscore-min.js"></script>
        <script type="text/javascript" src="app.js"></script>
	</body>
</html>