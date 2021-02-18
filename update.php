<?php
$login=trim($_POST["login"]);
$password=trim($_POST["password"]);
$newpassword=trim($_POST["newpassword"]);
/* Проверка заполнения всех полей формы авторизации */
if(empty($login) or empty($password))
{
 ?>
 <html>
 <head>
 <link rel="stylesheet" href="style.css" type="text/css"/>
 <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Одно из полей не заполнено</p>
 <a href="http://www.lab_z.ru" align='center'>Назад к заполнению</a>
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
/* Проверяем наличие пользователя с таким логином в БД */
$query_login = mysql_query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 0 , 30") or die(mysql_error());
$answer=mysql_num_rows($query_login);
if ($answer==0)
{
 ?><html>
 <head>
 <link rel="stylesheet" href="style.css" type="text/css"/>
 <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Пользователь с таким логином в БД не найден.</p>
 <a href="http://www.lab_z.ru" align='center'>Вернуться на главную страницу</a>
 </div>
 </body>
 </html>
 <?php
 mysql_close($connect);
 exit;
}
/* Проверяем корректность пары логин-пароль */
$answer_pass=mysql_fetch_array($query_login);
if($answer_pass['password']!=$password)
 {
 ?><html>
 <head>
 <link rel="stylesheet" href="style.css" type="text/css"/>
 <title>Error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Пароль введен не верно.</p>
 <a href="http://www.lab_z.ru" align='center'>Вернуться на главную страницу</a>
 </div>
 </body>
 </html>
 <?php
 mysql_close($connect);
 exit;
 }
?>
<?php
$query ="UPDATE users set password='$newpassword' where login='$login'";
?><html>
 <head>
 <link rel="stylesheet" href="style.css" type="text/css"/>
 <title>Личный кабинет пользователя</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>Личный кабинет пользователя <font color="red"><?php echo
$answer_pass['login'];
$result = mysql_query($query) or die("Ошибка " . mysql_error($connect)); 
mysql_close($connect);
?>
</font></p>
<br>
 <p align='center'>Пароль успешно изменен</p>
<br>
 <a href="http://www.lab_z.ru" align='center'>Вернуться на главную страницу</a>
 </div>
 </body>
</html> 