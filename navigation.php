<?php

  $noLogin = 0;
  $customer = 1;
  $opperator = 2;

  $ROUTES = array(
    'Login' => $noLogin,
    'Authenticate' => $noLogin,
    'Homepage' => $customer,
    'Mail' => $customer,
    'Profile' => $customer,
    'Activity' => $customer,
    'Logout' => $customer,
    'CustomerAdd' => $opperator
  );

  session_start();

	if (isset($_GET["content"])){
    $ROUTES[$_GET['content']] = 0;
    if ($ROUTES[$_GET['content']] == $noLogin || $_SESSION['User_role'] >= $ROUTES[$_GET['content']]){
      include($_GET["content"].".php");
    } else {
      include('login.php');
    }
	} else {
		include("login.php");
	}

 ?>
