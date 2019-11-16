<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body onload="setTimeout('delayedRedirect()', 2000)">
<center><h3 style="color: green;">Thank You For registration.Please login using credentials on next page</h3>
      	<p>This page will redirect in 2 seconds</p>
      </center>
</body>
 <script type="text/javascript">
	function delayedRedirect(){
		window.location = "index.php"
	}
	</script>
</html> 
