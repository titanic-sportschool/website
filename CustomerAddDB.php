<div class="Home_div">
  <div class="Home">
    <?php
      include('DB.php');

      //Getting the values given in the form.
      $firstname = $_POST['firstname'];
      $tussenvoegsel = $_POST['tussenvoegsel'];
      $lastname = $_POST['lastname'];
      $address = $_POST['address'];
      $postal = $_POST['postal'];
      $city = $_POST['city'];
      $bank = $_POST['bankinfo'];
      $birth = $_POST['birthdate'];

      $membership = $_POST['membership'];

      //Linking a number depending on the checked form value.
      if(isset($membership) && $membership == 'bronze'){
        $membershipID = 1;
      } elseif (isset($membership) && $membership == 'silver') {
        $membershipID = 2;
      } elseif (isset($membership) && $membership == 'gold') {
        $membershipID = 3;
      }

      //Getting gender and link the value to an int for the database.
      $gender = $_POST['gender'];

      if(isset($gender) && $gender == 'female'){
        $gender = 0;
      } elseif(isset($gender) && $gender == 'male'){
        $gender = 1;
      }

      $email = $_POST['email'];

      //Set default password to 'Welkom01'.
      $password = sha1('Welkom01', false);

      //Getting the current date for the registration date.
      $regdate = date("Y-m-d");

      $userquerie = "
      INSERT INTO User (Firstname, Tussenvoegsel, Lastname, Gender, Birthdate, Address, Zip_code, City, Bank_info, Register_date, Membership_ID)
        VALUES ('$firstname', '$tussenvoegsel', '$lastname', $gender, '$birth', '$address', '$postal', '$city', '$bank', '$regdate', $membershipID)";

      $result = mysqli_query($db, $userquerie);

      $resultID = mysqli_insert_id($db);

      $userIDquerie = "
      INSERT INTO Login (Email, Password, User_ID, User_role_ID)
        VALUES ('$email', '$password', '$resultID', '1')";

      $result = mysqli_query($db, $userIDquerie);

      //Checking if database insertion has succeeded
      if($result){
        echo '<center>Nieuwe gebruiker is toegevoegd aan de database!<center>
              <center>Een moment gedult voor u word doorgestuurd.....<center>';
        header('Refresh: 3; index.php?content=Homepage');
      } else {
        echo '<center>Er is iets misgegaan.<center><br>' . mysqli_error($db);
      }

    ?>
  </div>

</div>
