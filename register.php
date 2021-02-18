<?php
$login=trim($_POST["login"]);
$password=trim($_POST["password"]);
$dpassword=trim($_POST["dpassword"]);
$email=trim($_POST["email"]);
$name=trim($_POST["name"]);
/* Проверка заполнения всех полей формы регистрации */
if(empty($login) or empty($password) or empty($dpassword) or empty($email) or empty($name))
{
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'> 
 <p align='center'>Одно из полей не заполнено</p>
 <a href="http://www.lab_z.ru/register.html" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
<?php
exit;
}
/* Проверка равенства ввода паролей */
if($password!=$dpassword)
{
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Введенные пароли не совпали</p>
 <a href="http://www.lab_z.ru/register.html" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
<?php
exit;
}
/* Проверка формата заполнения полей */
if (!preg_match ("/[a-zA-Z0-9]/", $login))
{
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Поле логин не соответствует формату (только латинские символы и цифры)</p>
 <a href="http://www.lab_z.ru/register.html" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
<?php
exit;
}
if (!preg_match ("/.{6,}/", $password))
{
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Длина пароля должна быть больше 6 символов</p>
 <a href="http://www.lab_z.ru/register.html" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
<?php
exit; 
}
if (!preg_match ("/[a-z]+@[a-z]+\.[a-z]{2,3}/i", $email))
{
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Поле адреса не соответствует формату (primer@mail.ru)</p>
 <a href="http://www.lab_z.ru/register.html" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
<?php
exit;
}
/* Подключение к базе в случае успеха предыдущих проверок */
$mysql_login='root';
$mysql_host='localhost';
$mysql_pass='';
$mysql_db='lab2_z';
$connect=mysql_connect($mysql_host,$mysql_login,$mysql_pass) or die("Не могу подключиться к БД MySQL: " . mysql_error());
$select=mysql_select_db($mysql_db) or die("БД с таким именем не найдена: " . mysql_error());
/* Проверяем наличие пользователя с таким же логином в БД */
$query_login = mysql_query("SELECT * FROM users WHERE login = '$login' LIMIT 0 , 30") or die(mysql_error());
$answer=mysql_num_rows($query_login);
if ($answer>0)
{
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Пользователь с таким логином уже существует</p>
 <a href="http://www.lab_z.ru/register.html" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
<?php
mysql_close($connect);
exit;
}
$add_user="INSERT INTO `lab2_z`.`users` (`id`, `login`, `password`, `email`, `fio`) VALUES ('', '$login', '$password', '$email', '$name')";
$insert = mysql_query($add_user) or die(mysql_error());
if (!$insert)
 {
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Пользователя не добавить, запрос не сработал</p> 
 <a href="http://www.lab_z.ru/register.html" align='center'>Назад к заполнению</a>
 </div>
 </body>
 </html>
 <?php
 mysql_close($connect);
 exit;
 }
else
{
 ?><html>
 <head>
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Успешная регистрация</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Поздравляем с успешной регистрацией, теперь вы можете авторизоваться</p>
 <a href="http://www.lab_z.ru" align='center'>Перейти к авторизации</a>
 </div>
 </body>
 </html>
 <?php
 mysql_close($connect);
 exit;
}
?>