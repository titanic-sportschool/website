<div class="Home_div">
  <div class="Profile_div">
    <div class='Profile'>
      <?php
        include('DB.php');

        $userID = $_SESSION['User_ID'];

        $sql = "SELECT *
                FROM User, Membership, Login
                WHERE User.Membership_ID = Membership.ID
                  AND User.ID = Login.User_ID
                  AND User.ID = '$userID'";

        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($query);

        $email = $row['Email'];
        $regDate = $row['Register_date'];
        $bank = $row['Bank_info'];
        $membership = $row['Type'] . ', ' . $row['Description'];

        if(isset($_POST['update'])){
          $name = explode(" ", $_POST['name']);
          $firstname = $name[0];
          $tussenvoegsel = array_slice($name, 1, -1);
          $tussenvoegsel = implode(" ", $tussenvoegsel);
          $lastname = $name[count($name)-1];

          $updatesql = "UPDATE User
                        SET Firstname = '$firstname',
                            Tussenvoegsel = '$tussenvoegsel',
                            Lastname = '$lastname',
                            Address = '$_POST[address]',
                            Zip_code = '$_POST[postal]',
                            City = '$_POST[city]'
                        WHERE ID = $userID";
          mysqli_query($db, $updatesql);
          header('Location: index.php?content=Profile');
        }

        echo '<img src="IMG/avatar.png">';

        echo '<form action="index.php?content=Profile" method="POST">';
        echo '<b>Name: </b>
                <input autocomplete="off" class="Profile_input" type="text" name="name" value="'  . $row['Firstname'] . ' ' . $row['Tussenvoegsel'] . ' ' . $row['Lastname'] . '"><br><br>';
        echo "<b>E-mail/Username: </b>" . $email . '<br><br>';
        echo '<b>Address: </b>
                <input autocomplete="off" class="Profile_input" type="text" name="address" value="' . $row['Address'] . '"><br>
                <input autocomplete="off" class="Profile_input" type="text" name="postal" value="' . $row['Zip_code'] . '">
                <input autocomplete="off" class="Profile_input" type="text" name="city" value="' . $row['City'] . '"><br><br>';

        echo "<b>Register date: </b>" . $regDate . '<br><br>';
        echo "<b>Kind of membership: </b>" . $membership . '<br><br>';
        echo "<b>Bank info: </b>" . $bank . '<br><br>';

        echo '<p>*Dubbel klik de waarde die u wil veranderen.<br>
                *Als u klaar bent met aanpassen klik update.<br>
                *Leden kunnen alleen hun naam en adres veranderen, voor verdere aanpassingen aub een medewerker contacteren.
              </p>';

        echo '<div class="Button_left">
                <button type="submit" name="update">Update</button>
              </div>';
        echo '</form>';

      ?>

      <form class="Button_right" action="index.php?content=ChangePW" method="POST">
        <button type="submit" name="change">Wachtwoord veranderen</button>
      </form>

    </div>

    <div class="Button_left">
      <button name="back" onClick="location.href='index.php?content=Homepage'">Terug</button>
    </div>

  </div>
</div>
