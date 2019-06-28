<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<form method="post" action="{{route('postcreateuser')}}">
		<input type="text" name="email" placeholder="Email">
		<input type="text" name="SurName" placeholder="Surname">
		<input type="text" name="FirstName" placeholder="First Name">
		<input type="text" name="PhoneNumber" placeholder="Phone Number">
		<input type="text" name="AddressLine" placeholder="Address">
		<input type="text" name="DateOfBirth" placeholder="Date Of Birth">
		<!-- <input type="text" name="MutualFund" placeholder="Mutual Fund"> -->
		<input type="text" name="AccountNumber" placeholder="Account Number">
		<input type="text" name="MotherMaidenName" placeholder="Mother's Maiden Name">
		<input type="text" name="username" placeholder="Username">
		<input type="text" name="password" placeholder="Password">
		<input type="text" name="secret_question" placeholder="Secret Question">
		<input type="text" name="secret_question_ans" placeholder="Secret Question Answer">
		<input type="submit" value="Check">
	</form>
</body>
</html>