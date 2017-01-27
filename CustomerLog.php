<div class="Home_div">
  <div class="Log_div">
    <?php

      include('DB.php');

      $sql = "SELECT *
              FROM User, Membership, Log, Location
              WHERE User.Membership_ID = Membership.ID
                AND User.ID = Log.User_ID
                AND Log.Location_ID = Location.ID
              ORDER BY Log.Date ASC, Log.User_ID";

      $result = mysqli_query($db, $sql);

      echo '<table class="Log">
              <tr>
              <th>Date</th>
              <th>Name</th>
              <th>Membership</th>
              <th>Check-in/out</th>
              <th>Location</th>
            </tr>';

      while($row = mysqli_fetch_array($result)){
        if($row['Is_checkin'] == 1){
          $check = 'Check-in';
        } elseif($row['Is_checkin'] == 0) {
          $check = 'Check-out';
        }

        echo '<tr>';
        echo '<td>' . $row['Date'] . '</td>';
        echo '<td>' . $row['Firstname'] . ' ' . $row['Tussenvoegsel'] . ' ' . $row['Lastname'] . '</td>';
        echo '<td>' . $row['Type'] . '</td>';
        echo '<td>' . $check . '</td>';
        echo '<td>' . $row['Name']. '</td>';
        echo '</tr>';
      }

      echo '</table>'

    ?>

    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Back</button>
    </div>

  </div>
</div>
