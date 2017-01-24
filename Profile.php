<?php

  include('RequireLogin.php')

?>

<div class="Home_div">
  <div class="Home">
    <div>
      <?php
        include('DB.php');
        $user = $_SESSION['User_ID'];

        $sql = "SELECT * FROM User WHERE ID='$user'";

        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($query);

        $name = $row['Firstname'] . ' ' . $row['Tussenvoegsel'] . ' ' . $row['Lastname'];
        $address = $row['Address'] . ', ' . $row['City'];
        $regDate = $row['Register_date'];

        echo "Name: " . $name . '<br>';
        echo "Address: " . $address . '<br>';
        echo "Register date: " . $regDate . '<br>';

      ?>
    </div>

    <form class="Button_left" action="index.php?content=Homepage" method="POST">
      <button type="submit" name="back">Back</button>
    </form>

  </div>
</div>
