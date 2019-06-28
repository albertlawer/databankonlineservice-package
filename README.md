Databank Online Service Package
=======================

[![Latest Version](https://img.shields.io/github/release/albertlawer/databankonlineservice-package.svg?style=flat-square)](https://github.com/albertlawer/databankonlineservice-package.svg/releases)
[![Build Status](https://img.shields.io/travis/albertlawer/databankonlineservice-package.svg?style=flat-square)](https://travis-ci.org/albertlawer/databankonlineservice-package.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/albertlawer/databankonlineservice-package.svg?style=flat-square)](https://packagist.org/packages/albertlawer/databankonlineservice-package.svg)

This package gives the client access to make calls to the online service application

## Docs

Test Examples

| URL              		 | Description                       | Parameters          																 																								 			 |
|------------------------|-----------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| URL/getusername  		 | Check if a username is available  | `username`     	  													 																								 						 |
| URL/getlogin	   		 | Log a user in					 | `username`, `password`, `pin` 											 																								 					  |
| URL/getchangepassword  | Change password of a user		 | `UserName`, `NewPassword`, `AccountNumber`, `CurrentPassword` 					  																								 	 |
| URL/getupdate  		 | Update user details  			 | `email`, `PhoneNumber`, `username`, `password`, `secret_question`, `secret_question_ans` 																								 |
| URL/getcreateuser  	 | create a user 		  			 | `email`, `SurName`, `FirstName`, `PhoneNumber`, `AddressLine`, `DateOfBirth`, `AccountNumber`, `MotherMaidenName`, `username`, `password`, `secret_question`, `secret_question_ans` |







