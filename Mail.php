<?php

  include('RequireLogin.php');

?>

<div class="HomeDiv">
  <div class="home">

    <form action="" method="POST">
      <input type="text" placeholder="Subject" name="subject" autofocus>
      <textarea type="text" placeholder="Message" name="mailvalue" class="mail"></textarea>
    </form>

    <form class="ButtonRight" action="index.php?content=SendMail" method="POST">
      <button type="submit" name="send">Send</button>
    </form>

    <form class="ButtonLeft" action="" method="POST">
      <button onclick="history.go(-1);">Back</button>
    </form>

  </div>
</div>
