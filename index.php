  <?php 
  session_start();
  $title = "Отправить форму";
  require_once "header.php";    
  ?>
  <h1 style="font-weight: bold; margin-bottom: 30px;">Введите данные для отправки:</h1>
  <form class="form" action="check_contact.php" method="post">
    <input name="mailto" class="form__item mailto" type="text" value="Письмо: admin@mail.ru" disabled  >
    <input name="username" value="<?=$_SESSION["username"]?>" class="form__item" type="text" placeholder="Введите имя пользователя">
    <input name="mailfrom" value="<?=$_SESSION["mailfrom"]?>" class="form__item" type="text" placeholder="Введите ваш e-mail">
    <input name="subject" value="<?=$_SESSION["subject"]?>" class="form__item" type="text" placeholder="Тема сообщения">
    <textarea name="message" class="form__item" name="" placeholder="Введите ваше сообщение"><?=$_SESSION["message"]?></textarea>
    <input class="form__item form__item-b" type="submit" value="Отправить">
  </form>
  <div class="error">
    <?=$_SESSION["error"]?>
    <span class="success"><?=$_SESSION["success"]?></span>
  </div>
  <?php
  require_once "footer.php";
  ?>
