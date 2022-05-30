<?php 
    session_start();

    function redirect() {
      header('Location: index.php');
      exit();
    }

    $username = htmlspecialchars($_POST["username"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    $mailfrom = htmlspecialchars($_POST["mailfrom"]);

    $_SESSION["username"] = $username;
    $_SESSION["subject"] = $subject;
    $_SESSION["message"] = $message;
    $_SESSION["mailfrom"] = $mailfrom;
    $_SESSION["success"] = "";

if (!preg_match("/[0-9a-z]+@[a-z]/", $mailfrom)) {
  $_SESSION["error"] = "Введите правильный формат почтового адреса";
}
else if ($username =="") {
  $_SESSION["error"] = "Введите ваше имя";
}
else if (strlen($subject) < 5) {
  $_SESSION["error"] = "Введите тему сообщения не менее 5 символов";
}
else if (strlen($message) < 15) {
  $_SESSION["error"] = "Введите сообщение больше 15 символов";
} else {
  $_SESSION["error"] = "";
  $subject="=?utf-8?B?".base64_encode($subject)."?=";
  $headers = "From: $mailfrom\r\nReply-to: $mailfrom\r\nContent-type:text/plain; charset=utf=8\r\n";
  mail("admin@mail.ru", $subject, $message, $headers);
  $_SESSION["success"] = "$username ваше сообщение отправлено администратору!";
}
redirect();
?>