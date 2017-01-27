<div class="Home_div">
  <div class="New_user_form">

    <form action="index.php?content=CustomerAddDB" method="POST">

      <div><input type="text" autocomplete="off" name="firstname" placeholder="Firstname" autofocus><span class="Bar"></span></div>
      <div><input type="text" autocomplete="off" name="tussenvoegsel" placeholder="Tussenvoegsel"><span class="Bar"></span></div>
      <div><input type="text" autocomplete="off" name="lastname" placeholder="Lastname"><span class="Bar"></span></div>
      <div><input type="text" autocomplete="off" name="address" placeholder="Address"><span class="Bar"></span></div>
      <div><input type="text" autocomplete="off" name="postal" placeholder="Postal code"><span class="Bar"></span></div>
      <div><input type="text" autocomplete="off" name="city" placeholder="City"><span class="Bar"></span></div>
      <div><input type="text" autocomplete="off" name="bankinfo" placeholder="Bank information"><span class="Bar"></span></div>

      <div class="Radio">
        <span>Membership:</span>
        <ul>
          <li>
            <input type="radio" id="option1" name="membership" value="bronze" checked>
            <label for="option1">Bronze</label>

            <div class="check"><div class="inside"></div></div>
          </li>
          <li>
            <input type="radio" id="option2" name="membership" value="silver">
            <label for="option2">Silver</label>

            <div class="check"><div class="inside"></div></div>
          </li>
          <li>
            <input type="radio" id="option3" name="membership" value="gold">
            <label for="option3">Gold</label>

            <div class="check"><div class="inside"></div></div>
          </li>
        </ul>
      </div>

      <div>
        <input type="email" autocomplete="off" name="email" placeholder="E-mail"></span><span class="Bar"></span>
      </div>

      <div class="Button_right">
        <button type="submit" name="send"><span>Submit </span><i class="material-icons">send</i></button>
      </div>

    </form>
    <div class="Button_left">
      <button onClick="location.href='index.php?content=Homepage'">Back</button>
    </div>

  </div>
</div>
