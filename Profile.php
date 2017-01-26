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

    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Back</button>
    </div>

  </div>
</div>
