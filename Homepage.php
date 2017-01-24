<?php

  include("RequireLogin.php")

?>

<div class="Home_div">
  <div class="Home">
    <div class="Side">
      <nav>
        <ul>
          <?php
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
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultrices ultricies
        tellus, ut dignissim ligula lobortis auctor. Vivamus lobortis elementum viverra.
        Phasellus placerat et mauris nec consequat. Integer aliquam erat in eros lobortis, at
        tincidunt odio volutpat. Donec auctor ut metus ut egestas. Cras eu nibh eu massa scelerisque
        lobortis ut in tellus. Phasellus sollicitudin orci at feugiat dictum. Praesent tortor lectus,
        fermentum et volutpat quis, consequat et arcu. Pellentesque habitant morbi tristique
        senectus et netus et malesuada fames ac turpis egestas. Proin at odio dignissim, vestibulum
        mauris sed, commodo est. Nunc vitae ornare velit, non mattis nisi. Nunc a lacus velit. Nunc
        euismod ac nunc quis tempor. Morbi et nunc augue.
          <br>
          <br>
        Fusce finibus, felis ac faucibus pellentesque, felis velit tempus enim, et dapibus quam nunc in
        nisl. Quisque pulvinar tortor erat, non efficitur libero consequat vel. Nulla eu lorem risus.
        Pellentesque imperdiet quam orci, in interdum velit eleifend at. Aliquam suscipit nunc porttitor
        ex aliquet, eget pharetra sem placerat. Vivamus dictum commodo purus, quis vestibulum ipsum
        feugiat ut. Suspendisse tempus elementum aliquet. Morbi accumsan porttitor ex, eu imperdiet
        tortor facilisis a. Proin a quam dignissim, mattis lectus in, cursus justo. Proin sagittis vel
        turpis at efficitur. Duis tristique nibh a diam bibendum luctus. Nullam pulvinar elit non felis
        interdum, ac auctor quam commodo. Phasellus faucibus augue eget libero interdum, a auctor ante
        porta. Integer eget augue enim. Integer et laoreet eros. Nulla neque orci, commodo a nibh eu,
        scelerisque vulputate orci.
          <br>
          <br>
        Fusce ac enim pellentesque arcu rhoncus facilisis vitae vitae orci. Donec at lacinia nulla.
        Integer vel magna ultricies, scelerisque tellus id, tincidunt ante. Quisque vulputate, magna
        vitae tempor congue, metus diam interdum ipsum, nec iaculis odio ligula et quam. Etiam sodales
        luctus metus, non aliquam est molestie ac. Vestibulum justo dolor, rutrum in lacus sed, malesuada
        eleifend erat. Pellentesque egestas arcu a placerat interdum. Donec tristique, lacus ac bibendum
        sodales, turpis libero mattis tortor, vel ornare eros ex eget ipsum. Proin suscipit arcu at
        imperdiet facilisis. Vestibulum dapibus semper ante, ac accumsan nibh pulvinar vitae. In euismod
        risus sed dolor fermentum, sit amet luctus tellus maximus. Maecenas sagittis orci elit, in
        tristique sem sagittis vitae. Cras finibus sapien est, vel pretium lorem porttitor vitae.
        Interdum et malesuada fames ac ante ipsum primis in faucibus.

    </div>

  </div>
</div>

<script>
  $('.Drop_menu').on('click', function(){
    $('nav ul').toggleClass('Showing');
  })
</script>
