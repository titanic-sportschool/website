<!DOCTYPE html>
<html>

  <head>
    <title>Team Titanic ¯\_(ツ)_/¯</title>
    <link rel="stylesheet" type="text/css" href="CSS/global.css">
    <link rel="stylesheet" type="text/css" href="CSS/global960px.css">
    <link rel="stylesheet" type="text/css" href="CSS/global540px.css">
    <link rel="stylesheet" type="text/css" href="CSS/global320px.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>

  <body>
    <div>
      <?php

        //Navigation.php displays the content within index.php
        include("Navigation.php")

      ?>
    </div>

    <script>

    // Auto resize inputs.

      function resizeInput() {
          $(this).attr('size', $(this).val().length);
      }

      $('input[type="text"]')
          .keyup(resizeInput)
          .each(resizeInput);

    // Dubble click to focus input.

      $('td input[type=text], .Profile input[type=text]').on({
        focus: function() {
            if (!$(this).data('disabled')) this.blur()
        },
        dblclick: function() {
            $(this).data('disabled', true);
            this.focus()
        },
        blur: function() {
            $(this).data('disabled', false);
        }
    });

    </script>
  </body>

</html>
