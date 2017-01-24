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
      $regdate = date("Y-m-d");

      $userquerie = "
      INSERT INTO User (Firstname, Tussenvoegsel, Lastname, Address, Zip_code, City, Register_date, Membership_ID)
        VALUES ('$firstname', '$tussenvoegsel', '$lastname', '$address', '$postal', '$city', '$regdate', '1')";

      if(mysqli_query($db, $userquerie)){
        echo '<center>Succesfully added user to the database!<center>
              <center>Please wait while you get redirected.....<center>';
        header('Refresh: 3; index.php?content=Homepage');
      } else {
        echo '<center>An error has occured.<center><br>' . mysqli_error($db);
      }

    ?>
  </div>

</div>
