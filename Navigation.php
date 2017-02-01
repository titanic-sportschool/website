<?php

  //setting the user roles.
  $noLogin = 0;
  $customer = 1;
  $opperator = 2;
  $dev = 3;

  $ROUTES = array(
    'Login' => $noLogin,
    'Authenticate' => $noLogin,
    '404' => $noLogin,
    'Homepage' => $customer,
    'Mail' => $customer,
    'Profile' => $customer,
    'Activity' => $customer,
    'Advice' => $customer,
    'Logout' => $customer,
    'SendMail' => $customer,
    'ChangePW' => $customer,
    'ConfirmPW' => $customer,
    'CustomerAdd' => $opperator,
    'CustomerAddDB' => $opperator,
    'CustomerLog' => $opperator,
    'AllCustomers' => $opperator,
    'DB' => $dev,
    'Link' => $dev,
    'Navigation' => $dev,
    'RequireLogin' => $dev,
  );

  session_start();

  //Get page name from URL.
	if (isset($_GET["content"])){
    //If page name doesn't exist in routes display 404 page
    if(!in_array($_GET['content'], $ROUTES)){
      include('404.php');
    }
    //Checking if user has the right user role to acces the page, or if no login is needed.
    elseif ($ROUTES[$_GET['content']] == $noLogin || $_SESSION['User_role'] >= $ROUTES[$_GET['content']]){
      include($_GET["content"].".php");
      //If user has no acces to the page redirect to login page.
    } else {
      header('Location: index.php?content=Login');
    }
    //Get content not set redirect to login.php.
	} else {
		include("Login.php");
	}

 ?>
