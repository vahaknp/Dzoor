<html>
	<body>

		<scirpt type="text/javascirpt">
			function on_load() 
			{
				console.log(function(11))
			}

			function (number)
			{
				var letters = new Array("Ա","Բ","Դ","Ե","Զ","Է","Ը","Թ","Ժ","Ի","Լ","Խ","Ծ","Կ","Հ","Ձ","Ղ","Ճ","Մ","Յ","Ն","Շ","Ո","Չ","Պ","Ջ","Ռ","Ս","Վ","Տ","Ր","Ց","Ւ","Փ","Ք");
				round = 1
				outcome = ""
				while (number != 0)
				{
					curr = number % 10;
					number = number / 10;
					outcome +=  letters[curr*round];
					round += 1;
				}

				return (outcome)
			}

		</script>
	</body>
</html>
