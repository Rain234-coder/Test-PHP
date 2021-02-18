<html>
<head>
<title>Loading...</title>
</head>
<body>
 <div align="left" valign="center" style="background: yellow;
width: 300px; height: 150 px;">
 <p style="margin-top: 10px; margin-left: 10px; padding-bottom:
20px">
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Проверить, существует ли файл
if (file_exists($target_file)) {
 echo "Извините, файл уже существует.";
 $uploadOk = 0;
}
// Проверить размер файла
if ($_FILES["fileToUpload"]["size"] > 5) {
 echo "Извините, ваш файл слишком большой.";
 $uploadOk = 0;
}
// Разрешить определенные форматы файлов
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Извините, разрешено только файлы JPG, JPEG, PNG и GIF.";
 $uploadOk = 0; 
}
// Проверьте, имеет ли $uploadOk значение 0 по ошибке
if ($uploadOk == 0) {
 echo " <br> Ваш файл не был загружен. <br>Загрузите другой файл.";
// если все в порядке, попробуйте загрузить файл

} else {
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 echo "Файл ". basename( $_FILES["fileToUpload"]["name"]). " был загружен. Можете загрузить ещё. ";
 } else {
 echo "К сожалению, произошла ошибка при загрузке файла.";
 }
}
?>
    <form action="upload.php" method="post" name="upload"
enctype="multipart/form-data">
 <input type="file" name="fileToUpload" style="margin-bottom:20px">
  <input type="submit" value="Загрузить" name="button">
 <a href='index.php'>Вернуться к заполнению</a>
 </form>
 </p>
 </div>
</body>
</html>