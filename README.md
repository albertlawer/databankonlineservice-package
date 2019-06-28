Databank Online Service Package
=======================

[![Issues](https://img.shields.io/github/issues/albertlawer/databankonlineservice-package.svg?style=flat-square)](https://github.com)
[![Stars](https://img.shields.io/github/stars/albertlawer/databankonlineservice-package.svg?style=flat-square)](https://github.com)



This package gives the client access to make calls to the online service application

## Docs

Test Examples
Method: Post


| Endpoint               | Description                       | Parameters          																 																					 |
|------------------------|-----------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| getusername  		 | Check if a username is available  | `username`     	  													 																								 	 |
| getlogin		   		 | Log a user in					 | `username` `password` `pin` 											 																								 |
| getchangepassword		 | Change password of a user		 | `UserName` `NewPassword` `AccountNumber` `CurrentPassword` 					  																			  |
| getupdate  		 	 | Update user details  			 | `email` `PhoneNumber` `username` `password` `secret_question` `secret_question_ans` 																			 |
| getcreateuser  	 	 | create a user 		  			 | `email` `SurName` `FirstName` `PhoneNumber` `AddressLine` `DateOfBirth` `AccountNumber` `MotherMaidenName` `username` `password` `secret_question` `secret_question_ans` |



  


The package comes with sameple forms for tests.
```php
Username check = http://URL:PORT/getusername  
Login = http://URL:PORT/getlogin  
Create a user = http://URL:PORT/getcreateuser  
Update a user = http://URL:PORT/getupdate  
Change user password = http://URL:PORT/getchangepassword
```
