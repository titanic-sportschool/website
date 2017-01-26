<!DOCTYPE html>
<html>

  <head>
    <title>Team Titanic ¯\_(ツ)_/¯</title>
    <link rel="stylesheet" type="text/css" href="CSS/global.css">
    <link rel="stylesheet" type="text/css" href="CSS/global960px.css">
    <link rel="stylesheet" type="text/css" href="CSS/global540px.css">
    <link rel="stylesheet" type="text/css" href="CSS/global320px.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>

  <body>
    <div>
      <?php

        include("Navigation.php")

      ?>
    </div>

    <script>
      function goBack() {
          window.history.back();
      }

      function resizeInput() {
          $(this).attr('size', $(this).val().length);
      }

      $('input[type="text"]')
          .keyup(resizeInput)
          .each(resizeInput);

      $('td input').on({
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
