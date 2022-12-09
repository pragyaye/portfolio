<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pragya Gupta</title>
</head>
<body>
<? php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];
  header('Content-Type: application/json');
  if ($name === '') {
    print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
    exit();
  }
  if ($email === '') {
    print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
    exit();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
      exit();
    }
  }
  if ($subject === '') {
    print json_encode(array('message' => 'Subject cannot be empty', 'code' => 0));
    exit();
  }
  if ($message === '') {
    print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
    exit();
  }
  $content = "From: $name \nEmail: $email \nMessage: $message";
  $recipient = "pragyag212@gmail.com";
  $mailheader = "From: $email \r\n";
  mail($recipient, $subject, $content, $mailheader) or die("Error!");
  print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
  exit();
?>
</body>
</html>