<!DOCTYPE html> 
<html> 
<head> 
 <style> 
 .error {color: #FF0000;} 
 </style>
<meta charset="utf-8"> 
<title>Форма</title> 
</head> 
<body style='background: url(pic/background.jpg); background-size: 110%; color:white'>
<?php // определите переменные и задайте пустые значения 
$emailErr = "";
$email = ""; 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
 if (empty($_POST["email"])) {  
 $emailErr = "Почта обязательна";   
 } else { 
 $email = test_input($_POST["email"]);
  if (!preg_match("#^\w{3}\.[A-Z0-9]+@\w{1,7}\.[a-z]{1,3}\.[a-z]{1,3}$#",$email))
	 {  
 $emailErr = "Введите email типа aaa.1d@7s.ru.ru";
 $email="";
 }
 }
   if (empty($_POST["firstname"])) {  
 $nameErr = "Имя обязательно";   
 }
 
   if (empty($_POST["lastname"])) {  
 $lastErr = "Фамилия обязательна";   
 } 
   if (empty($_POST["oplata"])) {  
 $oplataErr = "Тип оплаты обязателен";   
 } 
   if (empty($_POST["room"])) {  
 $roomErr = "Тип номера обязателен";   
 } 
    if (empty($_POST["date"])) {  
 $dateErr = "Дата обязательна";   
 } 
  } 
 
function test_input($data) {
   $data = trim($data); 
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data; 
   } 
   ?> 
    <form action="enter.php" method="post">
   <table border="2">
   <tr style="border:none">
   <td style="border:none">
   <p align="center" style="margin-bottom:-4px"> Форма авторизации </p>
   <div style="display:flex" >
  <p style="margin-right:10px">Логин<input type="text" name="login" autocomplete="new-password"> </p>
  <p style="margin-right:10px">Пароль<input type="password" name="password" autocomplete="new-password"></p>
  <p style="margin-right:10px"><input type="submit" value="Войти"></p></tr>
   <td style="border:none"><p align='center' style="margin-top:-10px"><a href="http://www.lab_z.ru/register.html" align='center' style="color:white">Зарегистрироваться</a></p></tr>
 </table>
 </form>
 </div>
<form method="post" action="session.php">  <!-- < ?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
<table border="2" style="margin-top:10px"> 
<tr> 
<td><label for="firstname">Имя: </label> 
<td><input type="text" placeholder="Введите имя:" id="q" name="firstname"> <span class="error">* <?php echo $nameErr;?></span> 
<tr> 
<td><label for="lastname">Фамилия: </label> 
<td><input type="text" placeholder="Введите фамилию:" id="q" name="lastname"> <span class="error">* <?php echo $lastErr;?></span> 
<tr> 
<td><label for="email">Email: </label> 
<td><input type="text" placeholder="Введите email:" id="q" name="email" autocomplete="off">  <span class="error">* <?php echo $emailErr;?></span> 
<tr> 
<td><label for="oplata">Выберите способ оплаты:</label>  <span class="error">* <?php echo $oplataErr;?></span> 
<td> 
<input type="radio" name="oplata" value="наличными" id="1">Наличные<br> 
<input type="radio" name="oplata" value="банковской картой" id="2">Банковская карта<br> 
<tr> 
<td><label for="roomtype">Тип номера:</label> <span class="error">* <?php echo $roomErr;?></span> 
<td> <input type="radio" name="room" value="одноместный номер">Одноместный номер<br> 
<input type="radio" name="room" value="двухместный номер с большой кроватью">Двухместный номер с большой кроватью<br> 
<input type="radio" name="room" value="двухместный номер с двумя кроватями">Двухместный номер с двумя кроватями<br> 
<input type="radio" name="room" value="президентский люкс">Президентский люкс<br> 
<input type="radio" name="room" value="VIP-номер">VIP-номер<br> 
<tr> 
<td><label for="nightcall">Количество ночей:</label> 
<td><select size="5" name="component-select"> 
<option>1 ночь</option> 
<option>2 ночи</option> 
<option>3 ночи</option> 
<option>4 ночи</option> 
<option>5 ночей</option> 
<option>6 ночей</option> 
<option>7+ ночей</option> 
</select><br> 
<tr> 
<td><label for="prim">Примечание</label> 
<td><textarea name="thetext" rows="10" cols="40"></textarea><br> 
<tr> 
<td><label for="uslugi">Выберите дополнительные услуги</label> 
<td><input type="checkbox" name="a"> Доп кровать<br> 
<input type="checkbox" name="b"> Фен <br> 
<input type="checkbox" name="c" > Завтрак <br> 
<input type="checkbox" name="d" > Обед <br> 
<input type="checkbox" name="e"> Ужин <br> 
<input type="checkbox" name="f"> Обогреватель <br> 
<tr> 
<td><label for="Transfer">Выберите тип трансфера</label> 
<td> 
<input type="checkbox" name="Transfer" id="Transfer1">Из аэропорта<br> 
<input type="checkbox" name="Transfer" id="Transfer2">В аэропорт<br> 
<tr> 
<td><label for="pass">Если вы зарегестрированы введите секретный код</label> 
<td><input type="password" maxlength="25" id="q" size="40" name="secretcode" autocomplete="off"> 
<tr> 
<td><label for="date">Выберите день заезда</label>  <span class="error">* <?php echo $dateErr;?></span> 
<td><input type="date" id="date" name="date"> 
<tr> 
<td colspan="3" style="text-align:center"><input type="submit" value="Сохранить"> <input type="reset" value="Сбросить"> 

</form> 
	</table> 
    <form action="upload.php" method="post" name="upload"
enctype="multipart/form-data">
<table border="2">
 <tr>
 <td>
 Укажите файл для загрузки: </p>
 <input type="file" name="fileToUpload"><br>
 <input type="submit" value="Загрузить" name="button">
</table>
 </form>

<?php
$n0=$_POST["firstname"];
$n1=$_POST["lastname"];
$n2=$_POST["email"];
$n3=$_POST["oplata"];

$n4=$_POST["room"];
$n5=$_POST["date"];
$n6=$_POST["component-select"];
$n7=$_POST["thetext"];
if(!empty($n0) and !empty($n1) and !empty($n2) and !empty($n3) and !empty($n4) and !empty($n5) and !empty($n6))
 {
	  $res="Уважаемый $n0 $n1, вы выбрали $n4 на $n6, тип оплаты: $n3, дата планируемого заезда: $n5. <br><br>Информация о бронировании придет на вашу почту: $n2";
	  $source="Имя: $n0 
Фамилия: $n1
Email: $n2
Способ оплаты: $n3 
Тип номера: $n4
Дата заезда: $n5
Кол-во ночей: $n6";
	  $file="file.txt";
	  $Saved_File = fopen($file, 'w+');
	  fwrite($Saved_File, $source);
	  fclose($Saved_File);
	  echo "<html><head><title>Результат</title></head><body><div style='position: absolute; width: 1000px;
margin: 0 auto'></div><div style='position: absolute; width: 1000px;
margin-left: 70px'><form action='download.php' align='center'
style='color:white; width:400px; height:400 px;'";
 echo ">"."<p align='center'>".$res."</p>"."<br><input type='submit' value='Скачать'><br>
<br>
</form><img
src='pic/done.png' style='width: 200px; margin-left:450px; margin-top: -170px'></div></body></html>";

 if (!empty($n7))
	{
	  $res="Уважаемый $n0 $n1, вы выбрали $n4 на $n6, тип оплаты: $n3, дата планируемого заезда: $n5. В качестве примечания вы отметили: '$n7' <br><br>Информация о бронировании придет на вашу почту: $n2";
	  $source="Имя: $n0 
Фамилия: $n1
Email: $n2
Способ оплаты: $n3 
Тип номера: $n4
Дата заезда: $n5
Кол-во ночей: $n6
Примечание: $n7";
		 $file="file.txt";
	     $Saved_File = fopen($file, 'w+');
	     fwrite($Saved_File, $source);
	     fclose($Saved_File);
		 echo "<html><head><title>Результат</title></head><body><div style='position: absolute; width: 1000px;
margin: 0 auto'></div><div style='position: absolute; width: 1000px;
margin-left: 70px'><form action='download.php' align='center'
style='color:white; width:400px; height:400 px;'";
 echo ">"."<p align='center'>".$res."</p>"."<br><input type='submit' value='Скачать'<br>
<br>
</form>";
	}
 } 
?>
</body> 
</html> 
