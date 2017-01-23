<?php

  if(isset($_POST['login'])){

    include_once("db.php");
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $username = stripslashes($username);
    $password = stripslashes($password);

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    $password = sha1($password, false);

    $sql = "SELECT * FROM logindata WHERE email='$username' AND password = '$password' LIMIT 1";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['ID'];

    if(count($row) > 0){
      $_SESSION['username'] = $username;
      $_SESSION['ID'] = $id;
      header("Location: index.php?content=Homepage");
    } else {
      header("Location: /playground/");
      session_destroy();
    }
  }

  ?>
