<?php

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
    'Logout' => $customer,
    'SendMail' => $customer,
    'ChangePW' => $customer,
    'ConfirmPW' => $customer,
    'CustomerAdd' => $opperator,
    'CustomerAddDB' => $opperator,
    'AllCustomers' => $opperator,
    'DB' => $dev,
    'Link' => $dev,
    'Navigation' => $dev,
    'RequireLogin' => $dev,
  );

  session_start();

	if (isset($_GET["content"])){
    if(!in_array($_GET['content'], $ROUTES)){
      include('404.php');
    }
    elseif ($ROUTES[$_GET['content']] == $noLogin || $_SESSION['User_role'] >= $ROUTES[$_GET['content']]){
      include($_GET["content"].".php");
    } else {
      header('Location: index.php?content=Login');
    }
	} else {
		include("login.php");
	}

 ?>
