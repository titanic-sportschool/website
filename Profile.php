<div class="HomeDiv">
  <div class="home">
    <div class="info">
      <?php
        include('db.php');
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

    <form class="ButtonLeft" action="" method="POST">
      <button onclick="history.go(-1);return true;">Back</button>
    </form>

  </div>
</div>
