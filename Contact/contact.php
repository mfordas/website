<?php
htmlspecialchars($_SERVER["PHP_SELF"]);
if($_SERVER["REQUEST_METHOD"] == "POST"){

    /*$name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $message = test_input($_POST['message']);
    $subject = test_input($_POST['subject']);*/

    function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST['name']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST['email'])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST['email']);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      if (empty($_POST['message'])) {
        $subject = "";
      } else {
        $message = test_input($_POST['message']);
      }

      if (empty($_POST['subject'])) {
              $subject = "";
            } else {
              $subject = test_input($_POST['subject']);
            }

    $formcontent="$name \r\n $message \r\n";
    $recipient = 'mateusz@fordas.pl';
    $mailheader = "$email \r\n";
    $headers .= 'From: ' . $name . "\r\n";
    $headers .= 'E-mail: ' . $email . "\r\n";
    $headers .= 'Wiadmość: ' . $message . "\r\n";
    mail($recipient, $subject, $headers);
    }
?>


