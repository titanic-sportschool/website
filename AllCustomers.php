<div class="Home_div">
  <div class="Home">
    <?php

      include('DB.php');

      //When delete button is pressed, deletee user.
      if(isset($_POST['delete'])){
        $deleteuser = " DELETE FROM User
                        WHERE ID = $_POST[pk]";
        mysqli_query($db, $deleteuser);
        header('Location: index.php?content=AllCustomers');
      }

      //when update is pressed $membershipID gets an int based on the field value of membership
      if(isset($_POST['update'])){
        if($_POST['membership'] == 'Bronze'){
          $membershipID = '1';
        } elseif ($_POST['membership'] == 'Silver') {
          $membershipID = '2';
        } elseif ($_POST['membership'] == 'Gold') {
          $membershipID = '3';
        }

        //Split name into firstname tussenvoegsel and lastname.
        $name = explode(" ", $_POST['name']);
        $firstname = $name[0];
        $tussenvoegsel = array_slice($name, 1, -1);
        $tussenvoegsel = implode(" ", $tussenvoegsel);
        $lastname = $name[count($name)-1];

        //When update button is pressed, update values linked to user.
        $updatesql = "UPDATE User
                      SET Firstname = '$firstname',
                          Tussenvoegsel = '$tussenvoegsel',
                          Lastname = '$lastname',
                          Address = '$_POST[address]',
                          Zip_code = '$_POST[postal]',
                          City = '$_POST[city]',
                          Bank_info = '$_POST[bank]',
                          Membership_ID = $membershipID
                      WHERE ID = $_POST[pk]";
        mysqli_query($db, $updatesql);
        header('Location: index.php?content=AllCustomers');
      }

      //query to get all the usefull data for the user table
      $sql = "SELECT *
              FROM User, Membership, Login
              WHERE User.Membership_ID = Membership.ID
                AND User.ID = Login.User_ID
                AND Login.User_role_ID = 1
              ORDER BY Lastname";

      $result = mysqli_query($db, $sql);

      echo "<table>
              <tr>
              <th>E-mail</th>
              <th>Naam</th>
              <th>Adres</th>
              <th>Postcode</th>
              <th>Stad</th>
              <th>Bank info</th>
              <th>Lidmaatschap</th>
              <th></th>
            </tr>";

      while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<form action="index.php?content=AllCustomers" method="POST">';
        echo '<td><input autocomplete="off" class="Table_input" type="text" readonly name="email" value="' . $row['Email'] . '"></td>';
        echo '<td><input autocomplete="off" class="Table_input" type="text" name="name" value="'  . $row['Firstname'] . ' ' . $row['Tussenvoegsel'] . ' ' . $row['Lastname'] . '"></td>';
        echo '<td><input autocomplete="off" class="Table_input" type="text" name="address" value="' . $row['Address'] . '"></td>';
        echo '<td><input autocomplete="off" class="Table_input" type="text" name="postal" value="' . $row['Zip_code'] . '"></td>';
        echo '<td><input autocomplete="off" class="Table_input" type="text" name="city" value="' . $row['City'] . '"></td>';
        echo '<td><input autocomplete="off" class="Table_input" type="text" name="bank" value="' . $row['Bank_info'] . '"></td>';
        echo '<td><input autocomplete="off" class="Table_input" type="text" name="membership" value="' . $row['Type'] . '"></td>';
        echo '<td>
                <div class="Table_update">
                  <button type="submit" name="update"><i class="material-icons">mode_edit</i></button>
                  <button type="submit" name="delete" onclick="return checkDelete()"><i class="material-icons">delete</i></button>
                </div>
              </td>
              <td><input hidden name="pk" value="' . $row['User_ID'] . '"></td>
              </form>
              </tr>';
      }

      echo '</table>';
    ?>

    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Terug</button>
    </div>

  </div>
</div>
<script language="JavaScript" type="text/javascript">
  //User needs to confirm before deleting database entry
  function checkDelete(){
      return confirm('Weet je zeker dat je deze gebruiker wil verwijderen?');
  }
</script>
