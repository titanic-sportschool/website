<div class="Home_div">
  <div class="Home" style="padding:0; padding-top:10px;">
    <div class="Side">
      <nav>
        <ul>
          <?php
            //Displays the right menu options depending on user role.
            include("Link.php");
          ?>
          <a href="index.php?content=Logout"><li>Logout</li></a>
        </ul>
        <div class="Drop_menu">
          <img src="IMG/menu.png">
            menu
        </div>
      </nav>
    </div>

    <div class="Content">
        <img src="IMG/body.png" >
    </div>

  </div>
  <div class="Home_info">
    <div class="contact">
      <i class="material-icons">phone</i><br>
        +31 6 123456789<br><br>
      <i class="material-icons">location_on</i><br>
        Leiderdorp<br>
        <div class="map">
          Utrecht<br>
        </div>
        Amsterdam<br>
        's-Hertogenbosch<br>
        Delft<br>
    </div>
    <div class="social">
      <i class="ion ion-social-twitter"></i><br>
      <i class="ion ion-social-facebook"></i><br>
      <i class="ion ion-social-googleplus"></i><br>
      <i class="ion ion-social-instagram-outline"></i><br>
    </div>

  </div>
  <div class="Home_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2451.5913147772617!2d5.157552216136348!3d52.08716917973451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c668a2ee3d4063%3A0x98813670b98f268d!2sDaltonlaan+200%2C+3584+BJ+Utrecht!5e0!3m2!1snl!2snl!4v1485955086084" height="500px" frameborder="0" style="border:0"></iframe><br>
  </div>
</div>

<script>
  $('.Drop_menu').on('click', function(){
    $('nav ul').toggleClass('Showing');
  })

  $('.map').on('click', function(){
    $('iframe').toggleClass('Showing2');
  })

  $('.map').on('click', function(){
    $('.Home_map').toggleClass('Showing2');
  })
</script>
