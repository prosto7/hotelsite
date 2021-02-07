<?php 

function connect($host = "127.0.0.1" , $user = "root", $pass="root", $dbname = "travels,") {
$link = mysqli_connect($host, $user,$pass,$dbname);
if (!$link ) {
  echo "Ошибка, невозможно установить соединение";
  echo "Код ошибки errno".mysqli_connect_errno();
  echo "текст ошибки".mysqli_connect_error();
  exit;
}

echo "Соединение установлено ".PHP_EOL;
if (!mysqli_set_charset($link, "utf8")) {
  echo "Ошибка при загрузке кодировки символово".mysqli_error($link);
  exit;
}
echo "Соединение установлено".PHP_EOL;

return $link;


}