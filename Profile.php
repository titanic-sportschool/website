<div class="HomeDiv">
  <div class="home">
    <div class="info">
      <?php

        echo "User ID: " . $_SESSION['ID'] . '<br>';
        echo "Username: " . $_SESSION['username']

      ?>
    </div>

    <form class="ButtonLeft" action="" method="POST">
      <button onclick="history.go(-1);">Back</button>
    </form>

  </div>
</div>
