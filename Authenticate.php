<?php

  if(isset($_POST['login'])){

    include_once("DB.php");

    //Preventing mysql injection
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $username = stripslashes($username);
    $password = stripslashes($password);

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    //Enqrypting password
    $password = sha1($password, false);

    $sql = "SELECT * FROM Login WHERE Email='$username' AND Password = '$password' LIMIT 1";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['User_ID'];
    $User_role = $row['User_role_ID'];

    //If there is a match with the database set $_SESSION variables
    if(count($row) > 0){
      $_SESSION['username'] = $username;
      $_SESSION['User_ID'] = $id;
      $_SESSION['User_role'] = $User_role;
      header("Location: index.php?content=Homepage");
    } else {
      header("Location: index.php");
      session_destroy();
    }
  }

?>
