<?php 
session_start();
if (isset($_POST["submit_exit"]))
 {
 session_unset();
 session_destroy();
 }
if (!isset($_SESSION["firstname"]))
{
?>
<!DOCTYPE html>
 <html>
 <head>
   <link rel="stylesheet" href="style.css" type="text/css"/>
 <title>Session error</title></head>
 <body>
 <div align='center' style='background:orange; width:600px; height:30 px;'>
 <p align='center'>������ �����</p>
 <a href="http://www.lab_z.ru" align='center'>��������� �� �������
��������</a>
 </div>
 </body>
 </html>
<?php
@session_destroy();
exit;
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>�������� � ������� ������������</title></head>
 <body style='background: url(pic/1554052387_Hypnotoad3.gif); background-repeat: repeat-x; 	background-size:53%'>
<div align="center" style='background:#33ff33; width:400px;margin-left:42%'>
 <p align='center'>������ �� ������� ������ � ������������</p>
 <table border='2'>
 <tr><td>���: <?php echo $_SESSION['firstname'];?></td></tr>
 <tr><td>�������: <?php echo $_SESSION['lastname'];?></td></tr>
 <tr><td>E-mail: <?php echo $_SESSION['email'];?></td></tr>
  <tr><td>������ ������: <?php echo $_SESSION['oplata'];?></td></tr>
   <tr><td>��� ������: <?php echo $_SESSION['room'];?></td></tr>
 </table>
 <form action="page.php" method="POST">
 <input type="submit" name="submit_exit" value="������� ������ ������">
 </form>
 </div>
 </body>
</html> 