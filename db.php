<?php
$baglanti = new PDO ("mysql:host=localhost;
dbname=habersistemi;
charset=utf8","","");
$baglanti->exec("SET NAMES utf8");
//if($baglanti)echo "VT bağlantısı sağlandı";
//else echo "Bağlantı sağlanamaadı.";

?>