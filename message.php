//Contact Form in PHP
<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $website = htmlspecialchars($_POST['website']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "lylk@gmx.de"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Deine Nachricht wurde verschickt";
      }else{
         echo "Leider konnte Deine Nachricht nicht abgeschickt werden. Bitte versuche es erneut!";
      }
    }else{
      echo "Bitte trage eine gültige e-Mail Adresse ein";
    }
  }else{
    echo "Bitte trage eine E-mail Adresse und eine Nachricht ein";
  }
?>