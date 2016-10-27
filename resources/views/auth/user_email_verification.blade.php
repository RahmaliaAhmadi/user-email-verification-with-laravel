<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Verification</title>
</head>
<body> 
	<p>
		Greetings! <br>
		You have registered an account to {{ $company_name }} at {{ $registered_datetime }}. <br>
		One last task is to click the verification button to inform us that you are a real user.
	</p><br>

	Please click <a href="{{ route('account_verification', ['access_code' => $access_code, 'user' => $user]) }}">here</a> to verify your account. <br><br>
	Thank you.

	<br>
	- Support
</body>
</html>