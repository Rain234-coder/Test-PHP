<!DOCTYPE html> 
<html> 
<head> 
 <style> 
 .error {color: #FF0000;} 
 </style>
<meta charset="utf-8"> 
<title>�����</title> 
</head> 
<body style='background: url(pic/background.jpg); background-size: 110%; color:white'>
<?php // ���������� ���������� � ������� ������ �������� 
$emailErr = "";
$email = ""; 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
 if (empty($_POST["email"])) {  
 $emailErr = "����� �����������";   
 } else { 
 $email = test_input($_POST["email"]);
  if (!preg_match("#^\w{3}\.[A-Z0-9]+@\w{1,7}\.[a-z]{1,3}\.[a-z]{1,3}$#",$email))
	 {  
 $emailErr = "������� email ���� aaa.1d@7s.ru.ru";
 $email="";
 }
 }
   if (empty($_POST["firstname"])) {  
 $nameErr = "��� �����������";   
 }
 
   if (empty($_POST["lastname"])) {  
 $lastErr = "������� �����������";   
 } 
   if (empty($_POST["oplata"])) {  
 $oplataErr = "��� ������ ����������";   
 } 
   if (empty($_POST["room"])) {  
 $roomErr = "��� ������ ����������";   
 } 
    if (empty($_POST["date"])) {  
 $dateErr = "���� �����������";   
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
   <p align="center" style="margin-bottom:-4px"> ����� ����������� </p>
   <div style="display:flex" >
  <p style="margin-right:10px">�����<input type="text" name="login" autocomplete="new-password"> </p>
  <p style="margin-right:10px">������<input type="password" name="password" autocomplete="new-password"></p>
  <p style="margin-right:10px"><input type="submit" value="�����"></p></tr>
   <td style="border:none"><p align='center' style="margin-top:-10px"><a href="http://www.lab_z.ru/register.html" align='center' style="color:white">������������������</a></p></tr>
 </table>
 </form>
 </div>
<form method="post" action="session.php">  <!-- < ?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
<table border="2" style="margin-top:10px"> 
<tr> 
<td><label for="firstname">���: </label> 
<td><input type="text" placeholder="������� ���:" id="q" name="firstname"> <span class="error">* <?php echo $nameErr;?></span> 
<tr> 
<td><label for="lastname">�������: </label> 
<td><input type="text" placeholder="������� �������:" id="q" name="lastname"> <span class="error">* <?php echo $lastErr;?></span> 
<tr> 
<td><label for="email">Email: </label> 
<td><input type="text" placeholder="������� email:" id="q" name="email" autocomplete="off">  <span class="error">* <?php echo $emailErr;?></span> 
<tr> 
<td><label for="oplata">�������� ������ ������:</label>  <span class="error">* <?php echo $oplataErr;?></span> 
<td> 
<input type="radio" name="oplata" value="���������" id="1">��������<br> 
<input type="radio" name="oplata" value="���������� ������" id="2">���������� �����<br> 
<tr> 
<td><label for="roomtype">��� ������:</label> <span class="error">* <?php echo $roomErr;?></span> 
<td> <input type="radio" name="room" value="����������� �����">����������� �����<br> 
<input type="radio" name="room" value="����������� ����� � ������� ��������">����������� ����� � ������� ��������<br> 
<input type="radio" name="room" value="����������� ����� � ����� ���������">����������� ����� � ����� ���������<br> 
<input type="radio" name="room" value="������������� ����">������������� ����<br> 
<input type="radio" name="room" value="VIP-�����">VIP-�����<br> 
<tr> 
<td><label for="nightcall">���������� �����:</label> 
<td><select size="5" name="component-select"> 
<option>1 ����</option> 
<option>2 ����</option> 
<option>3 ����</option> 
<option>4 ����</option> 
<option>5 �����</option> 
<option>6 �����</option> 
<option>7+ �����</option> 
</select><br> 
<tr> 
<td><label for="prim">����������</label> 
<td><textarea name="thetext" rows="10" cols="40"></textarea><br> 
<tr> 
<td><label for="uslugi">�������� �������������� ������</label> 
<td><input type="checkbox" name="a"> ��� �������<br> 
<input type="checkbox" name="b"> ��� <br> 
<input type="checkbox" name="c" > ������� <br> 
<input type="checkbox" name="d" > ���� <br> 
<input type="checkbox" name="e"> ���� <br> 
<input type="checkbox" name="f"> ������������ <br> 
<tr> 
<td><label for="Transfer">�������� ��� ���������</label> 
<td> 
<input type="checkbox" name="Transfer" id="Transfer1">�� ���������<br> 
<input type="checkbox" name="Transfer" id="Transfer2">� ��������<br> 
<tr> 
<td><label for="pass">���� �� ���������������� ������� ��������� ���</label> 
<td><input type="password" maxlength="25" id="q" size="40" name="secretcode" autocomplete="off"> 
<tr> 
<td><label for="date">�������� ���� ������</label>  <span class="error">* <?php echo $dateErr;?></span> 
<td><input type="date" id="date" name="date"> 
<tr> 
<td colspan="3" style="text-align:center"><input type="submit" value="���������"> <input type="reset" value="��������"> 

</form> 
	</table> 
    <form action="upload.php" method="post" name="upload"
enctype="multipart/form-data">
<table border="2">
 <tr>
 <td>
 ������� ���� ��� ��������: </p>
 <input type="file" name="fileToUpload"><br>
 <input type="submit" value="���������" name="button">
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
	  $res="��������� $n0 $n1, �� ������� $n4 �� $n6, ��� ������: $n3, ���� ������������ ������: $n5. <br><br>���������� � ������������ ������ �� ���� �����: $n2";
	  $source="���: $n0 
�������: $n1
Email: $n2
������ ������: $n3 
��� ������: $n4
���� ������: $n5
���-�� �����: $n6";
	  $file="file.txt";
	  $Saved_File = fopen($file, 'w+');
	  fwrite($Saved_File, $source);
	  fclose($Saved_File);
	  echo "<html><head><title>���������</title></head><body><div style='position: absolute; width: 1000px;
margin: 0 auto'></div><div style='position: absolute; width: 1000px;
margin-left: 70px'><form action='download.php' align='center'
style='color:white; width:400px; height:400 px;'";
 echo ">"."<p align='center'>".$res."</p>"."<br><input type='submit' value='�������'><br>
<br>
</form><img
src='pic/done.png' style='width: 200px; margin-left:450px; margin-top: -170px'></div></body></html>";

 if (!empty($n7))
	{
	  $res="��������� $n0 $n1, �� ������� $n4 �� $n6, ��� ������: $n3, ���� ������������ ������: $n5. � �������� ���������� �� ��������: '$n7' <br><br>���������� � ������������ ������ �� ���� �����: $n2";
	  $source="���: $n0 
�������: $n1
Email: $n2
������ ������: $n3 
��� ������: $n4
���� ������: $n5
���-�� �����: $n6
����������: $n7";
		 $file="file.txt";
	     $Saved_File = fopen($file, 'w+');
	     fwrite($Saved_File, $source);
	     fclose($Saved_File);
		 echo "<html><head><title>���������</title></head><body><div style='position: absolute; width: 1000px;
margin: 0 auto'></div><div style='position: absolute; width: 1000px;
margin-left: 70px'><form action='download.php' align='center'
style='color:white; width:400px; height:400 px;'";
 echo ">"."<p align='center'>".$res."</p>"."<br><input type='submit' value='�������'<br>
<br>
</form>";
	}
 } 
?>
</body> 
</html> 
