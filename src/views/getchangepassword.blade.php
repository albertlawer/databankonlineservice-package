<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<form method="post" action="{{route('postchangepassword')}}">
		<input type="text" name="UserName" placeholder="UserName">
		<input type="text" name="NewPassword" placeholder="NewPassword">
		<input type="text" name="AccountNumber" placeholder="AccountNumber">
		<input type="text" name="CurrentPassword" placeholder="CurrentPassword">
		<input type="submit" value="Check">
	</form>
</body>
</html>
