<!DOCTYPE HTML> 
<html lang="en"> 
<head> 
	<title>Coding Dojo Weather Report</title> 
	<link rel="stylesheet" type="text/css" href="index.css"> 

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("form").submit(function(){
			
				$.get(
					$(this).attr('action')+"?callback=?", 
					$(this).serialize(),

					function(dojo){
					
						var city = dojo.data.request[0].query; 
						var tempF = dojo.data.current_condition[0].temp_F; 
						var tempC = dojo.data.current_condition[0].temp_C;
						var windspeed = dojo.data.current_condition[0].windspeedMiles;
						var description = dojo.data.current_condition[0].weatherDesc[0].value; 

						$("#city").html("Weather for: " + city + "<br />");
						$('#forecast').html("Current Temp F is: " + tempF + "<br />" + "Current Temp C is: " + tempC + "<br />" + "Current Windspeed is: " + windspeed + " " + "Mph" + "<br />" + "Weather description: " + description + "<br />"); 
			
					},
						 				
				"json"
				); 
				
			return false; 

			}); 
		}); 
	</script> 
</head> 
<body> 
	<h1 id="weatherheadline">Weather Report</h1> 
	<form action="http://api.worldweatheronline.com/free/v1/weather.ashx" method="get" id="form">
		<select name = "q"> <!-- q refers to the location; see API site; required  -->
			<option value = "Mountain View">Mountain View</option> 
			<option value = "Seattle">Seattle</option> 
			<option value = "Houston">Houston</option> 
		</select> 
		<input type="hidden" name="key" value="jtpc4myth9fwxjgwz9fh5fw5">
		<input type="hidden" name="format" value="json"> 
		<input type="submit" value="Get Weather"> 
	</form>  
	<h3 id="city"></h3> 
	<div id="forecast">
	</div>  
</body> 
</html>  