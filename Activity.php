<div class="Home_div">
  <div class="Activity_div">
    <?php

      include('DB.php');

      $sql = "SELECT *
              FROM Equipment, Equipment_used
              WHERE Equipment.ID = Equipment_used.Equipment_ID
              And User_ID = '$_SESSION[User_ID]'
              ORDER BY Date asc";

      $result = mysqli_query($db, $sql);

      echo '<table class="Activ">
              <tr>
              <th>Datum</th>
              <th>Tijd (min)</th>
              <th>Apparaten</th>
              <th>Calorieën</th>
            </tr>';

      while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>' . $row['Date'] . '</td>';
        echo '<td>' . $row['Time'] . '</td>';
        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Calories']. '</td>';
        echo '</tr>';
      }

      echo '</table>'

    ?>

    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Terug</button>
    </div>

  </div>
</div>
