<?php
$login=trim($_POST["login"]);
$password=trim($_POST["password"]);
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
 <p align='center'>Пользователь с таким логином в БД не найден. Предлагаем пройти
регистрацию.</p>
 <a href="http://www.lab_z.ru/register.html" align='center'>Перейти к регистрации</a>
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
?><html>
 <head>
 <link rel="stylesheet" href="style.css" type="text/css"/> 
 <title>Личный кабинет пользователя</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <h1>Личный кабинет пользователя <font color="red"><?php echo
$answer_pass['login'];?></font></p></h1>
 <h2>Вы успешно вошли</h2>
 <?php
 if ($login=='admin'){
	 ?>
	 <p align='center' style="font-weight:bold;font-size:20px">Таблица учетных записей пользователей </p>
 <table border="1">
 <tr><td>id</td><td>Логин</td><td>Пароль</td><td>email</td><td>ФИО</td></tr>
 <?php
 $users=mysql_query("SELECT * FROM `users`") or die(mysql_error());
 while($all_users=mysql_fetch_array($users)) 
 {
 echo
"<tr><td>".$all_users['id']."</td><td>".$all_users['login']."</td><td>".$all_users['password']."</td><td>".$all_users['email']."</td><td>"
.$all_users['fio']."</td><tr>";
 }
 mysql_close($connect);
 }
 ?>
  </table>
 <br>
 <form action="update.php" method="post">
 <p style="font-weight: bold; font-size:20px">Обновление данных</p>
 <table>
 <tr><td> Логин</td><td><input type="text" name="login"></td></tr>
 <tr><td>Старый пароль</td><td><input type="password" name="password" autocomplete="new-password"></td></tr>
  <tr><td>Новый пароль</td><td><input type="password" name="newpassword" autocomplete="new-password"></td></tr>
 <tr><td colspan="3" align="right"><input type="submit" value="Обновление"></td></tr>
 </table>
 </form>
<form action="delete.php" method="post">
 <p style="font-weight: bold; font-size:20px">Удаление пользователя</p>
 <table>
 <tr><td> Логин</td><td><input type="text" name="login" autocomplete="new-password"></td></tr>
 <tr><td>Пароль</td><td><input type="password" name="password" autocomplete="new-password"></td></tr>
 <tr><td colspan="2" align="right"><input type="submit" value="Удаление"></td></tr>
 </table>
 </form>
 <a href="http://www.lab_z.ru" align='center'>Вернуться на главную страницу</a>
 </div>
 </body>
</html> 