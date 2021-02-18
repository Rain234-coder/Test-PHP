<?php
file_force_download('file.txt');
function file_force_download($file) {
  if (file_exists($file)) {
    // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
    // если этого не сделать файл будет читаться в память полностью!
    if (ob_get_level()) {
      ob_end_clean();
    }
    // заставляем браузер показать окно сохранения файла
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    // читаем файл и отправляем его пользователю
    readfile($file);
  }
}
$file='file.txt';
$path = str_replace ( '\\', '/', getcwd () );

    // права доступа файла
$fileperms = substr ( decoct ( fileperms ( $path."/".$file ) ), 2, 6 );
if ( strlen ( $fileperms ) == '3' ){ $fileperms = '0' . $fileperms; }
print "
Права доступа к файлу ".$file.": " . $fileperms . "\n";
?>