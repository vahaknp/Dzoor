<html>
	<head>
		<? include ('get_server.php') ?>
		<meta http-equiv="content-type" content="text-html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="dzoor.css" media="screen" />
		<link rel="stylesheet" href="http://fonts.typotheque.com/WF-021658-002759.css" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css' />
		<title> Dzoor </title>
		
		<script type="application/javascript">
		    var array = <? echo json_encode($dServer); ?>;
		</script>
	</head>

	<body onLoad="on_load();">
		<div id="page">
			<div id="title">
				<div id="EngBox">
					<div id = "icon"> <img src="icon.bmp"> </div>
					<div id= "EngText">	
						Dzoor is a website that contains sentences mistranslated from Armenian to english. The direct translations result in silly Armenian sentences. This collection clearly presents the bambas.
					</div>
				</div>
				<div id="ArmBox">
					<div id= "ArmText">
						Հիշեց Խոսրովը իր պայմանը, եկավ առավ ավարի ու գերության, քարուքանդ արեց բազում ավաններ ու քաղաքներ ու տարավ գնաց:
					</div>
					<center> <hr id="line"> </hr> </center>
				</div>
			</div>

			<div id="content">
				<script id="posts" type="text/html">
					<% _.each(array, function(obj){ %>
						<% console.log("1")%>
						<canvas id="post1"></canvas>
						<%console.log(obj.Armenian)%>
						<%drawShape(8, 150, 150, "#69B7FF", 'post1')%>
					<% }); %>
				</script>
			</div>
		</div>


		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="http://underscorejs.org/underscore-min.js"></script>
        <script src="draw_shape.js"></script>
    </body>
</html>