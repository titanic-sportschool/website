<div class="Home_div">
  <div class="Log_div">
    <?php

      include('DB.php');

      //Query to get the general average of all users.
      $sql = "SELECT AVG(Calories), Name
              FROM Equipment_used, Equipment
              WHERE Equipment.ID = Equipment_used.Equipment_ID
              GROUP BY Equipment_ID";

      //Query to get the average of the current user.
      $sqluser = "SELECT AVG(Calories), Name
                  FROM Equipment_used, Equipment
                  WHERE Equipment.ID = Equipment_used.Equipment_ID
                  AND '$_SESSION[User_ID]' = User_id
                  GROUP BY Equipment_ID";

      $result = mysqli_query($db, $sql);
      $resultuser = mysqli_query($db, $sqluser);

      //Displaying 2 different queries on the page.
      while($rowuser = mysqli_fetch_array($resultuser) and $row = mysqli_fetch_array($result)){
        echo 'Uw <b>' . $rowuser['Name'] . '</b> gemiddelde is <b>' . round($rowuser['AVG(Calories)']) . ' Calorieën</b>' . '<br>';
        echo 'Het <b>' . $row['Name'] . '</b> gemiddelde van de sportschool is <b>' . round($row['AVG(Calories)']) . ' Calorieën</b>' . '<br><br>';

        //echoing certain strings based on calorie differences
        if($rowuser['AVG(Calories)'] < $row['AVG(Calories)']){
          echo ' Het sportschool gemiddelde ligt hoger dan uw gemiddelde, Het is aan te raden hier nog een tandje bij te zetten.<br><hr><br>';
        }
        if($rowuser['AVG(Calories)'] == $row['AVG(Calories)']){
          echo '  U loopt op dit onderdeel gelijk met de rest van de sportschool, ga zo door!<br><hr><br>';
        }
        if($rowuser['AVG(Calories)'] > $row['AVG(Calories)']){
          echo '  U loopt op dit onderdeel voor op de rest van de sport school, goed bezig!<br><hr><br>';
        }
      }

      echo '<br>';

    ?>
    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Terug</button>
    </div>
  </div>
</div>
