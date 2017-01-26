<div class="Home_div">
  <div class="Home" style="padding:0; padding-top:10px;">
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
        <img src="IMG/body.png" >
    </div>

  </div>
  <div class="Home_info">
     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultrices ultricies
     tellus, ut dignissim ligula lobortis auctor. Vivamus lobortis elementum viverra.
     Phasellus placerat et mauris nec consequat. Integer aliquam erat in eros lobortis, at
     tincidunt odio volutpat. Donec auctor ut metus ut egestas. Cras eu nibh eu massa scelerisque
     lobortis ut in tellus. Phasellus sollicitudin orci at feugiat dictum. Praesent tortor lectus,
     fermentum et volutpat quis, consequat et arcu. Pellentesque habitant morbi tristique
     senectus et netus et malesuada fames ac turpis egestas. Proin at odio dignissim, vestibulum
     mauris sed, commodo est. Nunc vitae ornare velit, non mattis nisi. Nunc a lacus velit. Nunc
     euismod ac nunc quis tempor. Morbi et nunc augue.
  </div>
</div>

<script>
  $('.Drop_menu').on('click', function(){
    $('nav ul').toggleClass('Showing');
  })
</script>
