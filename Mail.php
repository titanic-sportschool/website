<?php

  include('RequireLogin.php');

?>

<div class="Home_div">
  <div class="Home">

    <form action="#" method="POST">
      <input type="text" placeholder="Subject" name="subject" autofocus></span><span class="Bar"></span>
      <textarea type="text" placeholder="Message" name="mailvalue" class="Mail"></textarea>
    </form>

    <form class="Button_right" action="index.php?content=Homepage" method="POST">
      <button type="submit" name="send"><span>Send </span><i class="material-icons">send</i></button>
    </form>

    <form class="Button_left" action="index.php?content=Homepage" method="POST">
      <button type="submit" name="back">Back</button>
    </form>

  </div>
</div>
