<div class="Home_div">
  <div class="Home">
    <?php

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
      $mail->addAddress('blubberbuikje@gmail.com', 'Staff Mail');

      $mail->isHTML(true);

      $mail->Subject = $_POST['subject'];
      $mail->Body    = $_POST['mailvalue'];

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        echo '<center>Succesfully send a mail to staff<center>
              <center>Please wait while you get redirected.....<center>';
        header('Refresh: 3; index.php?content=Homepage');
      }

    ?>
  </div>
</div>
