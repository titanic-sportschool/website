<?php

  include('RequireLogin.php');

?>

<div class="HomeDiv">
  <div class="home">

    <form action="" method="POST">
      <input type="text" placeholder="Subject" name="subject" autofocus></span><span class="bar"></span>
      <textarea type="text" placeholder="Message" name="mailvalue" class="mail"></textarea>
    </form>

    <form class="ButtonRight" action="index.php?content=Homepage" method="POST">
      <button type="submit" name="send"><span>Send </span><i class="material-icons">send</i></button>
    </form>

    <form class="ButtonLeft" action="" method="POST">
      <button onclick="history.go(-1);return true;">Back</button>
    </form>

  </div>
</div>
