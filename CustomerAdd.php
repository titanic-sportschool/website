<?php

  include('RequireLogin.php')

?>

<div class="Home_div">
  <div class="New_user_form">

    <form action="index.php?content=CustomerAddDB" method="POST">

      <div><input type="text" name="firstname" placeholder="Firstname" autofocus required></span><span class="Bar"></span></div>
      <div><input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel"></span><span class="Bar"></span></div>
      <div><input type="text" name="lastname" placeholder="Lastname" required></span><span class="Bar"></span></div>
      <div><input type="text" name="address" placeholder="Address" required></span><span class="Bar"></span></div>
      <div><input type="text" name="postal" placeholder="Postal code" required></span><span class="Bar"></span></div>
      <div><input type="text" name="city" placeholder="City" required></span><span class="Bar"></span></div>
      <div><input type="text" name="bankinfo" placeholder="Bank information" required></span><span class="Bar"></span></div>

      <div class="Radio">
        <span>Membership:</span>
        <ul>
          <li>
            <input type="radio" id="option1" name="membership" value="bronze">
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
        <input type="email" name="email" placeholder="E-mail" required></span><span class="Bar"></span>
      </div>

      <div class="Button_right">
        <button type="submit" name="send"><span>Submit </span><i class="material-icons">send</i></button>
      </div>

      <div class="Button_left">
        <button onclick="goBack()">Back</button>
      </div>

    </form>

  </div>
</div>
