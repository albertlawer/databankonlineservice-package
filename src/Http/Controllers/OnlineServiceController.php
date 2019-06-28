<?php

	namespace Databank\OnlineService\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;


	class OnlineServiceController extends Controller
	{
	    public function getusername()
		    {
		    	return View('onlineservice::getusername');
		    }

	    public function postusername(Request $request)
		    {
		    	$username = $request->username;
		    	$service_url = 'http://10.179.253.242/databank.OnlineServiceApi/onlineservice/v1/get/username?username='.$username;
				
				$ch = curl_init($service_url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");   
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				    'Content-Type: application/json',
				    'timeout: 180',
				    'open_timeout: 180'
				    )
				);

				$result = curl_exec($ch);

				$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				$body = substr($result, $header_size);
				
				// {"Result":false,"Error":true,"Message":"User name osei is already taken","Errors":[]}
				$resp_data = json_decode($body, true);
				
				$result  = $resp_data["Result"];
				$error = $resp_data["Error"];
				$message = $resp_data["Message"];
				$Errors = $resp_data["Errors"];


				if ($error == true) 
					{
						$new_data = array("resp_code" => "101", "resp_desc" => $message, "errors" => $Errors);
					}
				elseif ($result == false) 
					{
						$new_data = array("resp_code" => "102", "resp_desc" => $message, "errors" => $Errors);
					}
				else 
					{
						$new_data = array("resp_code" => "100", "resp_desc" => $message);
					}

				$new_data = json_encode($new_data);
				return $new_data;
		    }



	    public function getlogin()
		    {
		    	return View('onlineservice::getlogin');
		    }

		public function postlogin(Request $request)
		   {
		   		$service_url = 'http://10.179.253.242/databank.OnlineServiceApi/onlineservice/v1/login';	
				$secret_key = "1BC82288BD9E4562AA2E0ABDE5F05F96";
				$username = $request->username;
				$password = $request->password;
				$pin = $request->pin;

			 	$data = array("username" => $username, "password" => $password, "pin" => $pin);
				$timestamp = date('YmdHis');

			 	$content = $secret_key.$username.$password.$pin.$timestamp;
				$jsonDataEncoded = json_encode($data);
				$signature =  hash ( 'sha512' ,  $content );

				$ch = curl_init($service_url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'TIMESTAMP: '. $timestamp,
					'HASH: '. $signature,
				    'Content-Type: application/json',
				    'timeout: 180',
				    'open_timeout: 180'
				    )
				);


				$result = curl_exec($ch);

				//{"resp_code":"100","resp_desc":"Login failed! Invalid Username or Password"}
				$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				$header = substr($result, 0, $header_size);
				$body = substr($result, $header_size);
				$resp_data = json_decode($body, true);
				$result  = $resp_data["Result"];
				$error = $resp_data["Error"];
				$message = $resp_data["Message"];
				$Errors = $resp_data["Errors"];

				if ($error == true) 
					{
						$new_data = array("resp_code" => "101", "resp_desc" => $message, "errors" => $Errors);
					}
				elseif ($result == false) 
					{
						$new_data = array("resp_code" => "102", "resp_desc" => $message, "errors" => $Errors);
					}
				else
					{
						$new_data = array("resp_code" => "100", "resp_desc" => $message);
					}

				$new_data = json_encode($new_data);
				return $new_data;
		   }





		 // {"resp_code":"101","resp_desc":"Invalid ModelState","errors":["The UserName field is required."]}
	    public function getcreateuser()
		    {
		    	return View('onlineservice::getcreateuser');
		    }

		public function postcreateuser(Request $request)
		   {
		   		$service_url = 'http://10.179.253.242/databank.OnlineServiceApi/onlineservice/v1/create/online/subscription';	
				$secret_key = "1BC82288BD9E4562AA2E0ABDE5F05F96";


				$email = $request->email;
				$SurName = $request->SurName;
				$FirstName = $request->FirstName;
				$PhoneNumber = $request->PhoneNumber;
				$AddressLine = $request->AddressLine;
				$DateOfBirth = $request->DateOfBirth;
				//$MutualFund = $request->MutualFund;
				$AccountNumber = $request->AccountNumber;
				$MotherMaidenName = $request->MotherMaidenName;

				$username = $request->username;
				$password = $request->password;
				$secret_question = $request->secret_question;
				$secret_question_ans = $request->secret_question_ans;

			 	$sub_data = array(
			 				"UserName" => $username, 
			 				"Password" => $password, 
			 				"SecretQuestion" => $secret_question, 
			 				"SecretQuestionAnswer" => $secret_question_ans
			 			);

			 	$sub_data_main = array(
			 				"email" => $email, 
			 				"SurName" => $SurName, 
			 				"FirstName" => $FirstName, 
			 				"PhoneNumber" => $PhoneNumber,
			 				"AddressLine" => $AddressLine, 
			 				"DateOfBirth" => $DateOfBirth, 
			 				//"MutualFund" => $MutualFund, 
			 				"AccountNumber" => $AccountNumber, 
			 				"MotherMaidenName" => $MotherMaidenName,
			 				"OnlineDetails" => $sub_data
			 			);


			 	// $main_data_one = $email.$SurName.$FirstName.$PhoneNumber.$AddressLine.$DateOfBirth.$MutualFund.$AccountNumber.$MotherMaidenName;

				$main_data_one = $email.$SurName.$FirstName.$PhoneNumber.$AddressLine.$DateOfBirth.$AccountNumber.$MotherMaidenName;

			 	$main_data_two = $username.$password.$secret_question.$secret_question_ans;

				$timestamp = date('YmdHis');

				$content_main = $main_data_one.$main_data_two;
			 	$content = $secret_key.$content_main.$timestamp;
				$jsonDataEncoded = json_encode($sub_data_main);
				$signature =  hash ( 'sha512' ,  $content );

				$ch = curl_init($service_url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'TIMESTAMP: '. $timestamp,
					'HASH: '. $signature,
				    'Content-Type: application/json',
				    'timeout: 180',
				    'open_timeout: 180'
				    )
				);


				$result = curl_exec($ch);

				//{"resp_code":"100","resp_desc":"Login failed! Invalid Username or Password"}
				$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				$header = substr($result, 0, $header_size);
				$body = substr($result, $header_size);

				$resp_data = json_decode($body, true);
				$result  = $resp_data["Result"];
				$error = $resp_data["Error"];
				$message = $resp_data["Message"];
				$Errors = $resp_data["Errors"];

				if ($error == true) 
					{
						$new_data = array("resp_code" => "101", "resp_desc" => $message, "errors" => $Errors);
					}
				elseif ($result == false) 
					{
						$new_data = array("resp_code" => "102", "resp_desc" => $message, "errors" => $Errors);
					}
				else
					{
						$new_data = array("resp_code" => "100", "resp_desc" => $message);
					}

				$new_data = json_encode($new_data);
				return $new_data;
		   }





		public function getupdate()
		    {
		    	return View('onlineservice::getupdate');
		    }

		public function postupdate(Request $request)
		   {
		   		$service_url = 'http://10.179.253.242/databank.OnlineServiceApi/onlineservice/v1/update';	
				$secret_key = "1BC82288BD9E4562AA2E0ABDE5F05F96";
				
				$Email = $request->email;
				$Password = $request->password;
				$UserName = $request->username;
				$PhoneNumber = $request->PhoneNumber;
				$SecretQuestion = $request->secret_question;
				$SecretQuestionAnswer = $request->secret_question_ans;

			 	$data = array("Email" => $Email, "Password" => $Password, "UserName" => $UserName, "PhoneNumber" => $PhoneNumber, "SecretQuestion" => $SecretQuestion, "SecretQuestionAnswer" => $SecretQuestionAnswer);
				$timestamp = date('YmdHis');

			 	$content = $secret_key.$Email.$Password.$UserName.$PhoneNumber.$SecretQuestion.$SecretQuestionAnswer.$timestamp;
				$jsonDataEncoded = json_encode($data);
				$signature =  hash ( 'sha512' ,  $content );

				$ch = curl_init($service_url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'TIMESTAMP: '. $timestamp,
					'HASH: '. $signature,
				    'Content-Type: application/json',
				    'timeout: 180',
				    'open_timeout: 180'
				    )
				);


				$result = curl_exec($ch);

				//{"resp_code":"101","resp_desc":"Login failed for updates! Invalid Username or Password","errors":[]}
				$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				$header = substr($result, 0, $header_size);
				$body = substr($result, $header_size);

				$resp_data = json_decode($body, true);
				$result  = $resp_data["Result"];
				$error = $resp_data["Error"];
				$message = $resp_data["Message"];
				$Errors = $resp_data["Errors"];

				if ($error == true) 
					{
						$new_data = array("resp_code" => "101", "resp_desc" => $message, "errors" => $Errors);
					}
				elseif ($result == false) 
					{
						$new_data = array("resp_code" => "102", "resp_desc" => $message, "errors" => $Errors);
					}
				else
					{
						$new_data = array("resp_code" => "100", "resp_desc" => $message);
					}

				$new_data = json_encode($new_data);
				return $new_data;
		   }










		public function getchangepassword()
		    {
		    	return View('onlineservice::getchangepassword');
		    }

		public function postchangepassword(Request $request)
		   {
		   		$service_url = 'http://10.179.253.242/databank.OnlineServiceApi/onlineservice/v1/reset/password';	
				$secret_key = "1BC82288BD9E4562AA2E0ABDE5F05F96";
				
				$UserName = $request->UserName;
				$NewPassword = $request->NewPassword;
				$AccountNumber = $request->AccountNumber;
				$CurrentPassword = $request->CurrentPassword;

			 	$data = array("UserName" => $UserName, "NewPassword" => $NewPassword, "AccountNumber" => $AccountNumber, "CurrentPassword" => $CurrentPassword);
				$timestamp = date('YmdHis');

			 	$content = $secret_key.$UserName.$NewPassword.$AccountNumber.$CurrentPassword.$timestamp;
				$jsonDataEncoded = json_encode($data);
				$signature =  hash ( 'sha512' ,  $content );

				$ch = curl_init($service_url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'TIMESTAMP: '. $timestamp,
					'HASH: '. $signature,
				    'Content-Type: application/json',
				    'timeout: 180',
				    'open_timeout: 180'
				    )
				);


				$result = curl_exec($ch);

				//{"resp_code":"101","resp_desc":"Login failed for updates! Invalid Username or Password","errors":[]}
				$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				$header = substr($result, 0, $header_size);
				$body = substr($result, $header_size);

				$resp_data = json_decode($body, true);
				$result  = $resp_data["Result"];
				$error = $resp_data["Error"];
				$message = $resp_data["Message"];
				$Errors = $resp_data["Errors"];

				if ($error == true) 
					{
						$new_data = array("resp_code" => "101", "resp_desc" => $message, "errors" => $Errors);
					}
				elseif ($result == false) 
					{
						$new_data = array("resp_code" => "102", "resp_desc" => $message, "errors" => $Errors);
					}
				else
					{
						$new_data = array("resp_code" => "100", "resp_desc" => $message);
					}

				$new_data = json_encode($new_data);
				return $new_data;
		   }

	}
