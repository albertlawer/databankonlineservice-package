<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<form method="post" action="{{route('postupdate')}}">
		<input type="text" name="email" placeholder="Email">
		<input type="text" name="PhoneNumber" placeholder="Phone Number">
		<input type="text" name="username" placeholder="Username">
		<input type="text" name="password" placeholder="Password">
		<input type="text" name="secret_question" placeholder="Secret Question">
		<input type="text" name="secret_question_ans" placeholder="Secret Question Answer">
		<input type="submit" value="Check">
	</form>
</body>
</html>
