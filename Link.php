<?php

  if(isset($_SESSION['User_role'])){

    switch ($_SESSION['User_role']) {
      case $noLogin:
        break;

      case $customer:
        echo'

          <a href="index.php?content=Profile"><li>My profile</li></a>
          <a href="index.php?content=Activity"><li>Activity</li></a>
          <a href="index.php?content=Advice"><li>Advice</li></a>
          <a href="index.php?content=Mail"><li>Contact staff</li></a>';

        break;

      case $opperator:
        echo'

          <a href="index.php?content=AllCustomers"><li>All customers</li></a>
          <a href="index.php?content=CustomerLog"><li>Customer log</li></a>
          <a href="index.php?content=CustomerAdd"><li>Add new user</li></a>';

        break;
        default:
        break;
    }
  }

?>
