<div class="Home_div">
  <div class="Home">

    <form action="index.php?content=SendMail" method="POST">
      <input autocomplete="off" type="text" placeholder="Onderwerp" name="subject" autofocus></span><span class="Bar"></span>
      <textarea type="text" placeholder="Bericht" name="mailvalue" class="Mail"></textarea>
      <div class="Button_right">
        <button type="submit" name="send"><span>Versturen </span><i class="material-icons">send</i></button>
      </div>
    </form>

    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Terug</button>
    </div>

  </div>
</div>
