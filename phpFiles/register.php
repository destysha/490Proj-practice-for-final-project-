<?php
session_start();
require('../rabbitMQFiles/testRabbitMQClient.php');
 //will have register client function

//will hold values for logging
$logs = array();

$username = $_POST['usernamesignup'];
$street = $_POST['streetsignup']; 
$city = $_POST['citysignup'];
$state = $_POST['statesignup'];
$email = $_POST['emailsignup'];
$password1 = $_POST['passwordsignup'];
$password = $_POST['passwordsignup_confirm'];
$response = register($username,$street,$city,$state,$email,$password);
	//make a logging funtion for this
	if ( $password1 != $password)
	{
                array_push($logs,$username,$password);
                require("registeredN.inc.php");
                echo"Sorry passwords didn't match";
		exit();
	}

        if($response != false){ #account was registered successfully
                array_push($logs,$username,$email,$password);
		require("registeredY.inc.php");     
                echo"Created User successfully!!";
        }
        else{ //account Already exist
        	array_push($logs,$username);
		require("registeredN.inc.php");
                echo"Sorry username already exists";
        }
	

/*
//check if user clicked Register button
if(isset($_POST['submit']))
{
	$username = $_POST['usernamesignup'];
	$street = $_POST['streetsignup'];
	$city = $_POST['citysignup'];
	$state = $_POST['statesignup'];
	$email = $_POST['emailsignup'];
	$password1 = $_POST['passwordsignup'];
	$password = $_POST['passwordsignup_confirm'];
	$response = register($username,$street,$city,$state,$email,$password);

        if($response != false)
	{ //account was registered successfully
                array_push($logs,$username,$email,$password);
		require("registeredY.inc.php");
                echo"Created User successfully!!";
        }
        else{ //not registered
		array_push($logs,$username,$email,$password);
		require("registeredN.inc.php");
		 header('location:../index.php/#toregister?register=noregister')
                echo"Sorry username already exists";
		exit();
        }

}
//user did not click submit
else
{
	 header('location:../index.php/#toregister?register=nosubmit');
         exit();
}
*/	
?>
