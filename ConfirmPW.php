<div class="Home_div">
  <div class="Profile_div">
    <?php

      include('DB.php');

      $userID = $_SESSION['User_ID'];

      $oldpw = $_POST['oldpw'];
      $oldpw = sha1($oldpw, false);

      $newpw = $_POST['newpw'];
      $newpwcheck = $_POST['newpwcheck'];

      $password = sha1($newpw, false);

      $sql = "SELECT Password
              FROM Login
              WHERE User_ID = '$userID' LIMIT 1";

      $updatepwsql = "UPDATE Login
                      SET Password = '$password'
                      WHERE User_ID = $userID";

      $query = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($query);

      if($row['Password'] == $oldpw && strlen($newpw) > 4 && $newpw == $newpwcheck){
        mysqli_query($db, $updatepwsql);
        echo '<center>Succesfully changed your password!<center>
              <center>Please wait while you get redirected.....<center>';
        header('Refresh: 3; index.php?content=Profile');
      } elseif(strlen($newpw) < 4 && $newpw == $newpwcheck){
        echo '<center>New password must be atleast 4 characters long.</center>';
        header('Refresh: 3; index.php?content=ChangePW');
      } else {
        echo '<center>Old or new passwords did not match.<center
              <center>Please wait while you get redirected.....<center>';
        header('Refresh: 3; index.php?content=ChangePW');
      }


    ?>
  </div>
</div>
