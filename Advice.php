<div class="Home_div">
  <div class="Log_div">
    <?php

      include('DB.php');

      $sql = "SELECT AVG(Calories), Name
              FROM Equipment_used, Equipment
              WHERE Equipment.ID = Equipment_used.Equipment_ID
              GROUP BY Equipment_ID";

      $sqluser = "SELECT AVG(Calories), Name
                  FROM Equipment_used, Equipment
                  WHERE Equipment.ID = Equipment_used.Equipment_ID
                  AND '$_SESSION[User_ID]' = User_id
                  GROUP BY Equipment_ID";

      $result = mysqli_query($db, $sql);
      $resultuser = mysqli_query($db, $sqluser);

      while($rowuser = mysqli_fetch_array($resultuser) and $row = mysqli_fetch_array($result)){
        echo 'Uw <b>' . $rowuser['Name'] . '</b> gemiddelde is <b>' . round($rowuser['AVG(Calories)']) . ' Calorieën</b>' . '<br>';
        echo 'Het <b>' . $row['Name'] . '</b> gemiddelde van de sportschool is <b>' . round($row['AVG(Calories)']) . ' Calorieën</b>' . '<br><br>';
        if($row['AVG(Calories)'] > $rowuser['AVG(Calories)']){
          echo ' Het sportschool gemiddelde ligt hoger dan uw gemiddelde, Het is aan te raden hier nog een tandje bij te zetten.<br><hr><br>';
        } elseif($row['AVG(Calories)'] == $rowuser['AVG(Calories)']){
          echo '  U loopt op dit onderdeel gelijk met de rest van de sportschool, ga zo door!<br><hr><br>';
        } elseif($rowuser['AVG(Calories)'] < $row['AVG(Calories)']){
          echo '  U loopt op dit onderdeel voor op de rest van de sport school, goed bezig!<br><hr><br>';
        }
      }

      echo '<br>';

      while($row = mysqli_fetch_array($result)){


      }

    ?>
    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Terug</button>
    </div>
  </div>
</div>
