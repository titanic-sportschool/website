<div class="Home_div">
  <div class="Profile_div">
    <div class="Profile">

      <form action="index.php?content=ConfirmPW" method="POST">
        <div><input type="password" name="oldpw" placeholder="Oud wachtwoord"><span class="Bar"></span></div>
        <div><input type="password" name="newpw" placeholder="Nieuw wachtwoord"><span class="Bar"></span></div>
        <div><input type="password" name="newpwcheck" placeholder="Herhaal nieuw wachtwoord"><span class="Bar"></span></div>

        <div class="Button_right">
          <button type="submit" name="confirm">Bevestig</button>
        </div>
      </form>

      <div class="Button_left">
        <button name="back" onClick="location.href='index.php?content=Profile'">Terug</button>
      </div>

    </div>
  </div>
</div>
