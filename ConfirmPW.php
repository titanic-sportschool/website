<div class="Home_div">
  <div class="Profile_div">
    <?php

      include('DB.php');

      //Get user id to find user in database
      $userID = $_SESSION['User_ID'];

      $oldpw = $_POST['oldpw'];
      $oldpw = sha1($oldpw, false);

      $newpw = $_POST['newpw'];
      $newpwcheck = $_POST['newpwcheck'];

      $password = sha1($newpw, false);

      //Query for current users login credentials.
      $sql = "SELECT Password
              FROM Login
              WHERE User_ID = '$userID' LIMIT 1";

      //Querie to update the login credentials.
      $updatepwsql = "UPDATE Login
                      SET Password = '$password'
                      WHERE User_ID = $userID";

      $query = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($query);

      //Check if current password matches the one in the database and check if the 2 new passwords match/ are > 4 chars
      if($row['Password'] == $oldpw && strlen($newpw) > 4 && $newpw == $newpwcheck){
        mysqli_query($db, $updatepwsql);
        echo '<center>Uw wachtwoord is veranderd!<center>
              <center>Een moment gedult voor u word doorgestuurd<center>';
        header('Refresh: 3; index.php?content=Profile');
        //Display error when new password is not longer than 4 chars.
      } elseif(strlen($newpw) < 4 && $newpw == $newpwcheck){
        echo '<center>Het nieuwe wachtwoord moet minstens 4 karakters hebben.</center>';
        header('Refresh: 3; index.php?content=ChangePW');
        //Display error when passwords don't match.
      } else {
        echo '<center>Het nieuwe of oude wachtwoord kwam niet overeen.<center
              <center>Een moment gedult voor u word doorgestuurd<center>';
        header('Refresh: 3; index.php?content=ChangePW');
      }


    ?>
  </div>
</div>
