<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<form method="post" action="{{route('postlogin')}}">
		<input type="text" name="username" placeholder="Username">
		<input type="text" name="password" placeholder="Password">
		<input type="text" name="pin" placeholder="Pin">
		<input type="submit" value="Check">
	</form>
</body>
</html>