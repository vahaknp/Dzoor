<html>
	<head>
		<? include ('get_server.php') ?>
		<meta http-equiv="content-type" content="text-html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="dzoor.css" media="screen" />
		<link rel="stylesheet" href="http://fonts.typotheque.com/WF-021658-002759.css" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css' />
		<script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
		<title> Dzoor </title>
				
		<script type="application/javascript">
		    var array = <? echo json_encode($dServer); ?>;
		    var id = 0;

	    	WebFont.load({
		    custom: {
		      families: ['arian_amu', 'fedra_sans_light', 'fedra_sans_book'],
		      urls : ['dzoor.css']
		    }
		  	});
		</script>
	</head>


	<body bgcolor="#FFFFFF" onload="on_load()">
		<div id="page">		
			<div id="title">
				<div id = "icon"> <center> <object type="image/svg+xml" data="logovec.svg"></object> </center> </div>
				<div id="EngBox">
					<div id= "EngText">	Dzoor is a website that contains sentences mistranslated from Armenian to english. The direct translations result in silly Armenian sentences. This collection clearly presents.
					</div>
				</div>
				<!--
				<div id="ArmBox">
					 <div id= "ArmText">
						Հիշեց Խոսրովը իր պայմանը, եկավ առավ ավարի ու գերության, քարուքանդ արեց բազում ավաններ ու քաղաքներ ու տարավ գնաց:
					</div>
					
				</div>
				-->
				<center> <hr id="line"> </hr> </center>
			</div>

			<div id="content">
				<script id="posts" type="text/html">

					<%liveAmount = 0;%>
					<% _.each(array, function(obj){ %>
						<%if (obj.Live == 1){liveAmount += 1 }%>	
					<% }); %>		

					<% liveAmount  = 10 %>

					<%colors = new Array();%>
					<% for(i=0; i < liveAmount; i++){%>
						<% if (i < liveAmount * 0.4) colors.push("FF4D4D"); else if(i < liveAmount * 0.8) colors.push("#469AE9"); else colors.push("#AAAAAA");%>
					<%}%>

					<%for(var j, x, i = colors.length; i; j = parseInt(Math.random() * i), x = colors[--i], colors[i] = colors[j], colors[j] = x);%>

					<%if (liveAmount == 0){%>
						<%$('#content').append('<div class="vahaksucks" number='+(1)+'>  </div>');%>
					<%} else {%>
						<%idcount = 2%>
						<% _.each(array, function(obj){ %>
							<%if (obj.Live == 1){%>
								<%makeShape(obj.ID, obj.Armenian, obj.English, obj.Place, obj.Name, obj.NameArm, obj.Date, obj.Votes, idcount, 120, colors[idcount], '#content');%>
								<%console.log(idcount == liveAmount + 1)%>
								<% if (idcount == liveAmount + 1 && idcount%4 != 0){%>
									<% for(i=0; i < idcount%4; i++){%>
										<%$('#content').append('<div class="vahaksucks" number='+(idcount-i)+'>  </div>');%>
									<%}%>
								<%} else if(idcount%4 == 0){%>
									<%$('#content').append('<div class="vahaksucks" number='+(idcount-3)+'>  </div>');%>
									<%$('#content').append('<div class="vahaksucks" number='+(idcount-2)+'>  </div>');%>
									<%$('#content').append('<div class="vahaksucks" number='+(idcount-1)+'>  </div>');%>
									<%$('#content').append('<div class="vahaksucks" number='+(idcount)+'>  </div>');%>
								<%}%>
								<%idcount += 1;%>
							<%}%>	
						<% }); %>
					<%} %>
				</script>
			</div>

			
			
		</div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="http://underscorejs.org/underscore-min.js"></script>
        <script src="app.js"></script>
    </body>
</html>