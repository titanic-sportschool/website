<div class="Home_div">
  <div class="Home">
    <?php

      include('RequireLogin.php');
      include('DB.php');

      $firstname = $_POST['firstname'];
      $tussenvoegsel = $_POST['tussenvoegsel'];
      $lastname = $_POST['lastname'];
      $address = $_POST['address'];
      $postal = $_POST['postal'];
      $city = $_POST['city'];
      $bank = $_POST['bankinfo'];

      $email = $_POST['email'];
      $password = sha1('Welkom01', false);

      $regdate = date("Y-m-d");

      $userquerie = "
      INSERT INTO User (Firstname, Tussenvoegsel, Lastname, Address, Zip_code, City, Register_date, Membership_ID)
        VALUES ('$firstname', '$tussenvoegsel', '$lastname', '$address', '$postal', '$city', '$regdate', '1')";

      $result = mysqli_query($db, $userquerie);

      $resultID = mysqli_insert_id($db);

      $userIDquerie = "
      INSERT INTO Login (Email, Password, User_ID, User_role_ID)
        VALUES ('$email', '$password', '$resultID', '1')";

      $result = mysqli_query($db, $userIDquerie);


      if($result){
        echo '<center>Succesfully added user to the database!<center>
              <center>Please wait while you get redirected.....<center>';
        header('Refresh: 3; index.php?content=Homepage');
      } else {
        echo '<center>An error has occured.<center><br>' . mysqli_error($db);
      }

      mysqli_close($db);

    ?>
  </div>

</div>
