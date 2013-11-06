selectedId = 0;


function on_load2(){
	template = $("#posts").html();
    $('#pending').append(_.template(template,{"array":array}));
}

function on_load() 
{
	makeSubShape(-1, 1, 120, '#content')
	template = $("#posts").html();
    $('#content').append(_.template(template,{"array":array}));
    $('.vahaksucks').each(function(index){
        $(this).hide(0);
    });
}

// ######## SHAPES ######## // 

function makeShape(ID, Armenian, English, Place, Name, NameArm, leDate, Votes, idcount, size, ondiv)
{
	var canvas = document.createElement('canvas');

	var colors = new Array("#FF4D4D","#469AE9","#FF4D4D","#469AE9", "#AAAAAA")
	//var colors = new Array("#E84C3D","#F1C40F", "#1BBC9B", "#9B58B5")
	//var colors = new Array("#D81236","#38558F","#38558F","#D96700","#F2B76B")
	color = colors[Math.floor(Math.random() * colors.length)];
	
	canvas.sides = Votes
	canvas.color = color
	canvas.id = "canvas";
	canvas.width = size;
	canvas.height = size;
	canvas.style.position = "relative";
	canvas.style.margin = "15px 15px 5px 15px"
	canvas.clickedBefore = false;

	canvas.setAttribute('number', idcount)
	canvas.setAttribute('Armenian', Armenian)
	canvas.setAttribute('English', English)
	canvas.setAttribute('Place', Place)
	canvas.setAttribute('Name', Name)
	canvas.setAttribute('NameArm', NameArm)
	canvas.setAttribute('Date', leDate)
	canvas.setAttribute('Votes', Votes)
	canvas.setAttribute('Place', Place)

	$('#content').append(canvas);
	
	drawShapeUp(canvas)
}

function makeSubShape(Votes, idcount, size, ondiv)
{
	var canvas = document.createElement('canvas');

	canvas.sides = 4
	canvas.color = "#FFD464"
	canvas.id = "canvas";
	//canvas.id = "submitShape";
	canvas.width = size;
	canvas.height = size;
	canvas.style.position = "relative";
	canvas.style.margin = "15px 15px 5px 15px"

	canvas.setAttribute('number', idcount)
	canvas.setAttribute('Votes', Votes)

	$('#content').append(canvas);
	
	drawShapeUp(canvas)
}

function makeShapeHull(size, sides, ondiv, isSubmit)
{
	var canvas = document.createElement('canvas');

	canvas.id = "hull"
	canvas.style.float = "right"
	canvas.style.marginRight = "16px";

	if (isSubmit)
		canvas.style.marginTop = "3px"


	width = size
	height = size
	canvas.width = width
	canvas.height = height
	canvas.setAttribute('Sides', parseInt(sides))
	canvas.checked =  false;

	$(ondiv).append(canvas);

	drawShapeHull(canvas, sides)
}


function drawShapeUp(canvasIn)
{	
	var canvas = canvasIn

	id = $(canvas).attr('number')
	votes = $(canvas).attr('Votes')
	width = canvas.width
	height = canvas.height
	sides = canvas.sides
	color = canvas.color

	var graphics = canvas.getContext("2d");

	// clear
	graphics.clearRect(0,0,width,height);
	canvas.width = canvas.width;
	
	// draw
	offset = 5
	fill = true
	stroke = false
	shapeGraphics(graphics, color, width, sides, offset, fill, stroke)


	// text
	graphics.fillStyle = "#FFFFFF";;
	graphics.textAlign="center"
	if (votes == -1)
	{
		graphics.font = 'bold 33pt arial';
		graphics.fillText(armConvert(votes),width/2,height/2 + 16);
	}
	else
	{
		graphics.font = 'normal 27pt arian_amu';
		graphics.fillText(armConvert(votes),width/2,height/2 + 13);
	}
}

function drawShapeDown(canvasIn)
{
	var canvas = canvasIn

	id = $(canvas).attr('number')
	width = canvas.width
	height = canvas.height
	sides = canvas.sides
	color = canvas.color
	color = '#FFFFFF'

	var graphics = canvas.getContext("2d");

	graphics.globalAlpha   = 0.2;
	
	offset = 5
	fill = true
	stroke = false

	shapeGraphics(graphics, color, width, sides, offset, fill, stroke)
}


function drawShapeHull(canvasIn, sides, check)
{
	var canvas = canvasIn
	width = canvas.width
	height = canvas.height
	var graphics = canvas.getContext("2d");

	// clear
	graphics.clearRect(0,0,width,height);
	canvas.width = canvas.width;

	fix = 0.5;
	middle = width/2;

	if (check)
	{
		fix = 0;
		//check
		graphics.moveTo(middle - 6 + fix - 2, middle + fix);
		graphics.lineTo(middle + fix - 2, middle + 6 + fix); 
		graphics.lineTo(middle + 12 + fix - 2, middle - 6 + fix);
	}
	else
	{
		// +
		graphics.moveTo(middle + fix,middle - 8 + fix);
		graphics.lineTo(middle + fix, middle + 8 + fix);
		graphics.moveTo(middle - 8 + fix, middle + fix); 
		graphics.lineTo(middle + 8 + fix, middle + fix);
	}

	// draw
	graphics.stroke()
	offset = 5
	fill = false
	stroke = true
	shapeGraphics(graphics, color, width, sides, offset, fill, stroke)
} 

function shapeGraphics(graphics, color, width, sides, offset, fill, stroke)
{
	graphics.fillStyle = color
	graphics.strokeStyle = "#000000"
	graphics.lineWidth=1;

	if(sides == 3)
		pushdown = 4;
	else
		pushdown = 0;

	graphics.beginPath();
	graphics.moveTo(width/2,offset);  

	
	rad = width/2 - offset
	angle = (sides-2) * Math.PI/sides

	for (var i=1;i<=sides-1;i++)
	{ 
		l = Math.sqrt(2*rad*rad*(1 - Math.cos((Math.PI*2/sides) * i)))
		pointx = l * Math.cos((Math.PI/2 - angle/2)*i)
		pointy = l * Math.sin((Math.PI/2 - angle/2)*i) + offset	+ pushdown
		graphics.lineTo(pointx + width/2 , pointy); 
	}
	graphics.closePath();

	if (fill)
		graphics.fill()
	if (stroke)
		graphics.stroke()
}



// ######## ARROWS ######## // 

function placeArrowBar(position, ondiv)
{
	var canvas = document.createElement('canvas');

	canvas.style.position = "relative"
	canvas.style.float = "top"
	canvas.height = 30
	canvas.width = 600

	var graphics = canvas.getContext("2d");

	graphics.strokeStyle = "#000000"
	graphics.lineWidth = "1";

	fix = 0.5
	start = ((position-1)%4) * 150 + 75 - 20

	graphics.beginPath();
	graphics.moveTo(start + fix,0 + fix);  

	graphics.lineTo(start + 6 + fix, 6 + fix); 
	graphics.moveTo(start + fix, 0 + fix); 
	graphics.lineTo(start - 6 + fix, 6 + fix); 

	graphics.moveTo(0 + fix, 15 + fix);
	graphics.lineTo(start + fix, 15+ fix); 
	graphics.lineTo(start + fix, 1 + fix);  


	graphics.stroke();

	$(ondiv).append(canvas);
}

$('#content').on('click', '#canvas',  function(e) {
        e.preventDefault();
        var clickid;

        clickedBefore = $(this).prop('clickedBefore')
        clickid = $(this).attr('number')
        Armenian = $(this).attr('Armenian')
        English = $(this).attr('English')
        Place = $(this).attr('Place')
        Name = $(this).attr('Name')
        NameArm = $(this).attr('NameArm')
        leDate = $(this).attr('Date')
        Votes = $(this).attr('Votes')

	   	if(clickid == 1)
	   	{
	   		// submit shape html
		    htmlstring = "  <div class='submittext'> \
								<input type='textbox' class='sentbox' id='english' placeholder='In English'></input> \
								<input type='textbox' class='sentbox' id='armenian' placeholder='Հայերենով'></input> \
								<input type='textbox' class='otherbox' id='name' placeholder='And you are?'></input> \
								<input type='textbox' class='otherbox' id='location' placeholder='Where?'></input> \
							</div> "
	   	}
	   	else
	   	{
	        // all other shapes
	        htmlstring = "	<span class='engFont'> In " +Place+", <br>	\
	        				"+Name+" Thought: '"+English+"'.  <br>	\
	        				</span> <span class='armFont'> Սուրէնը ըսավ: 'Ձրի ժամանակ ունի՞ս:'  <br>	\
	        				Զինքը վաստակած է "+Votes+" կողմ: </span>	"
	        

	        // SHOULD BE !!! HTML string
	        //htmlstring = "	<span class='engFont'> In " +Place+", <br>	\
	        //				"+Name+" Thought: '"+English+"'.  <br>	\
	        //				</span> <span class='armFont'> "+NameArm+" ըսավ: '"+Armenian+"'  <br>	\
	        //				Զինքը վաստակած է "+Votes+" կողմ: </span> 	"
	        //	   		
	   	}

        if (!($(this).hasClass('.clicked')))
        {
        	// Make this pressed
        	drawShapeDown($(this)[0])

        	// Make all others not pressed
        	$('.clicked').each(function(index, obj)
        	{
	        		if ($(this).attr('number') == selectedId)
	        		{
	        			drawShapeUp($(this)[0])
	        		}

	        });
	    }


        if ($(this).hasClass("clicked")){
        	// If this shaped was already clicked
        	drawShapeUp($(this)[0])
       		$('.vahaksucks').each(function(index){
				$(this).hide('fast');
				selectedId = 0
	        });
	    }
        else{
        	selectedId = clickid
        	$('.clicked').each(function()
        	{
                $(this).toggleClass("clicked");
            });

        	$('.vahaksucks').each(function(index){
        		if ($(this).attr('number') == clickid)
        		{
        			//$(this).html("")
        			if (!clickedBefore)
        			{
        				placeArrowBar(clickid,  $(this))

        				if(clickid == 1)
        					makeShapeHull(80, 3, $(this), true)
        				else
							makeShapeHull(80, Votes, $(this), false)

						$(this).append(htmlstring)
					}
					$(this).show('fast');	
        		}
        		else{
        			if($(this).attr('number')/4 == selectedId/4)
        				$(this).hide();
        			else
        				$(this).hide('fast');
        		}
        	});
        };
        $(this).toggleClass("clicked");
        $(this).prop('clickedBefore', true);
});


// Mouse over/out

//Canvas

$('#content').on('mouseover', '#canvas',  function(e) {
		e.preventDefault();
		if ($(this).attr('number') != selectedId)
		{
			drawShapeDown($(this)[0])
		}			
});

$('#content').on('mouseout', '#canvas',  function(e) {
		e.preventDefault();
		if ($(this).attr('number') != selectedId)
		{
			drawShapeUp($(this)[0])
		}
			
});

//Hull

$('#content').on('mouseover', '#hull',  function(e) {
		e.preventDefault();
		sides = $(this).attr('Sides')
		drawShapeHull($(this)[0], parseInt(sides) + 1, true)
			
});

$('#content').on('mouseout', '#hull',  function(e) {
		e.preventDefault();
		sides = $(this).attr('Sides')
		if (!$(this).prop('checked'))
		{
			drawShapeHull($(this)[0], parseInt(sides), false)
		}		
});


//  Click

$('#content').on('click', '#hull',  function(e) {
	$(this).attr('Clicked', true); 
	console.log($(this).prop('checked', true))
});



$('#page').on('click', '#submit',  function(e) {
	e.preventDefault();
	$.post( 
     "insert.php",
     {english: $('#english').val(), armenian: $('#armenian').val(), name: $('#name').val(), location: $('#location').val()},
     function(data) {
        $('#page').html(data);
 	});
});

// Click pending

$('#pending').on('click', '#live',  function(e) {
	e.preventDefault();
	console.log($(this).attr('id_number'));
	$.post( 
     "update.php",
     {ID: $(this).attr('id_number')},
     function(data) {
        location.reload(true)
 	});

});


$('#pending').on('click', '#kill',  function(e) {
	e.preventDefault();
	console.log("KILL");
	$.post( 
     "kill.php",
     {ID: $(this).attr('id_number')},
     function(data) {
        location.reload(true)
 	});
});

$('#pending').on('click', '#delete',  function(e) {
	e.preventDefault();
	console.log("DELETED");
	$.post( 
     "delete.php",
     {ID: $(this).attr('id_number')},
     function(data) {
        location.reload(true)
 	});
});


$('#pending').on('click', '#edit',  function(e) {
	e.preventDefault();
	console.log("id:", $(this).attr('id_number'), "arm:", $(this).siblings("#Armenian").val(), "eng:", $(this).siblings("#English").val(), "pla:", $(this).siblings("#Place").val(), "name:", $(this).siblings("#Name").val(), "armname:", $(this).siblings("#NameArm").val());
	$.post( 
     "edit.php",
     {ID: $(this).attr('id_number'), armenian: $(this).siblings("#Armenian").val(), english: $(this).siblings("#English").val(), place: $(this).siblings("#Place").val(), name: $(this).siblings("#Name").val(), namearm: $(this).siblings("#NameArm").val()},
     function(data) {
        location.reload(true)
     });
 });


// ######## OTHER ######## // 

function rounder (number){
	remainder = number%4
		if (remainder == 0){
			return number
		}
		else{
			return Number(number) + 4 - remainder;
	};
}



function armConvert(number)
{	
	// submit case
	if (number == -1)
	{
		return "+"
	}
	//

	var letters = new Array("Ա","Բ","Գ","Դ","Ե","Զ","Է","Ը","Թ","Ժ","Ի","Լ","Խ","Ծ","Կ","Հ","Ձ","Ղ","Ճ","Մ","Յ","Ն","Շ","Ո","Չ","Պ","Ջ","Ռ","Ս","Վ","Տ","Ր","Ց","Ւ","Փ","Ք");
	round = 0
	outcome = ""
	while (number != 0)
	{
		curr = number % 10;
		number = Math.floor(number / 10);
		if (curr != 0)
		{
			outcome =  letters[curr + 10*round - (round +1)] + outcome;
		}
		round += 1;
	}
	return (outcome)
}