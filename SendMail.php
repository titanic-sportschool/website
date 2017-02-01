<div class="Home_div">
  <div class="Home">
    <?php

      //Importing the MAIL lib and setting the correct values.
      require 'MAIL/PHPMailerAutoload.php';

      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'sportbenno@gmail.com';
      $mail->Password = 'BennoSport';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('sportbenno@gmail.com', $_SESSION['username']);
      $mail->addAddress('bartvanstraaten@hotmail.com', 'Staff Mail');

      $mail->isHTML(true);

      //Get the text entered on the mail page.
      $mail->Subject = $_POST['subject'];
      $mail->Body    = nl2br($_POST['mailvalue']);

      //Check if mail has succesfully been sent or not, and give an message accordingly. -> redirect after.
      if(!$mail->send()) {
          echo '<div style="text-align:center">Bericht is niet verzonden.' . '<br>';
          echo 'Mailer Error: ' . $mail->ErrorInfo . '</div>';
          echo '<div class=Button_left style="display:block; margin:auto">
                  <button onClick=location.href="index.php?content=Homepage">Home</button>
                </div>';
      } else {
        echo '<center>Het bericht is verzonden naar een medewerker<center>
              <center>Een moment gedult voor u word doorgestuurd.....<center>';
        header('Refresh: 3; index.php?content=Homepage');
      }

    ?>
  </div>
</div>
