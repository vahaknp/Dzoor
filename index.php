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
				<div id = "icon"> <center> <object type="image/svg+xml" data="logovec3.svg"></object> </center> </div>
				<div id="EngBox">
					<div id= "EngText">	
						Languages don’t always necessarily map one to one. If you think in one language and speak in another, things can get <span class='armFont'> ծուռիկ-մուրիկ </span>. Just because you're free doesn't mean that you're not worth anything. <br> So if Ara asks, "<span class='armFont'>Ձրի ե՞ս:</span>", laugh on him and upload it to Dzoor.
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

					<%colors = new Array();%>
					<% for(i=0; i < liveAmount; i++){%>
						<% if (i < liveAmount * 0.4) colors.push("#FF4D4D"); else if(i < liveAmount * 0.8) colors.push("#469AE9"); else colors.push("#AAAAAA");%>
					<%}%>

					<%for(var j, x, i = colors.length; i; j = parseInt(Math.random() * i), x = colors[--i], colors[i] = colors[j], colors[j] = x);%>

					<%if (liveAmount == 0){%>
						<%$('#content').append('<div class="vahaksucks" number='+(1)+'>  </div>');%>
					<%} else {%>
						<%idcount = 2%>
						<% _.each(array, function(obj){ %>
							<%if (obj.Live == 1){%>
								<%console.log(colors[idcount])%>
								<%makeShape(obj.ID, obj.Armenian, obj.English, obj.Place, obj.Name, obj.NameArm, obj.Date, obj.Votes, idcount, 120, colors[idcount-2], '#content');%>
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