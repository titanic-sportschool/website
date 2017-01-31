<?php

  if(isset($_SESSION['User_role'])){

    switch ($_SESSION['User_role']) {
      case $noLogin:
        break;

      case $customer:
        echo'

          <a href="index.php?content=Profile"><li>Mijn profiel</li></a>
          <a href="index.php?content=Activity"><li>Activiteit</li></a>
          <a href="index.php?content=Advice"><li>Advies</li></a>
          <a href="index.php?content=Mail"><li>Contacteer medewerker</li></a>';

        break;

      case $opperator:
        echo'

          <a href="index.php?content=AllCustomers"><li>Alle leden</li></a>
          <a href="index.php?content=CustomerLog"><li>Leden logboek</li></a>
          <a href="index.php?content=CustomerAdd"><li>Nieuwe gebruiker toevoegen</li></a>';

        break;
        default:
        break;
    }
  }

?>
