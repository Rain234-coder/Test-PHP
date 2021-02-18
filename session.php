<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
$firstname=trim($_POST["firstname"]);
$lastname=trim($_POST["lastname"]);
$email=trim($_POST["email"]);
$oplata=trim($_POST["oplata"]);
$room=trim($_POST["room"]);
/* Проверка заполнения всех полей формы авторизации */
if(empty($firstname) or empty($lastname) or empty($email) or empty($oplata) or empty($room))
{
 ?>
<!DOCTYPE html>
 <html>
 <head><title>Error</title></head>
 <body   <link rel="stylesheet" href="style.css" type="text/css"/>>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Одно из полей не заполнено</p>
  <table>
 <tr><td>Имя: <?php echo $_SESSION['firstname'];?></td></tr>
 <tr><td>Фамилия: <?php echo $_SESSION['lastname'];?></td></tr>
 <tr><td>E-mail: <?php echo $_SESSION['email'];?></td></tr>
  <tr><td>Способ оплаты: <?php echo $_SESSION['oplata'];?></td></tr>
   <tr><td>Тип номера: <?php echo $_SESSION['room'];?></td></tr>
 </table>
 <a href="http://www.lab_z.ru" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
<?php
exit;
}
/* Сохраняем данные пользователя в массив сессии и выводим ссылку на след. страницу */
$_SESSION['firstname']=$firstname;
$_SESSION['lastname']=$lastname;
$_SESSION['email']=$email;
$_SESSION['oplata']=$oplata;
$_SESSION['room']=$room;
?>
<!DOCTYPE html>
<html>
 <head>
   <link rel="stylesheet" href="style.css" type="text/css"/>
   <title>Успешная запись в сессию</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Данные записаны в сессионный массив</p>
 <a href="http://www.lab_z.ru/page.php" align='center'>Перейти на страницу с
выводом данных из сессии</a>
 </div>
 </body>
</html> 