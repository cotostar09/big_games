<?php
//0. 설정
$mysql_port = '3306';

$dbServer = '127.0.0.1';
$dbName = 'big_games';
$dbChar = 'UTF8';

$dbUser = 'root';
$dbPass = 'shinji42';

$dsn = "mysql:host=".$dbServer.";dbname=".$dbName.";charset=".$dbChar;

try {
	$db_connect = new PDO($dsn,$dbUser,$dbPass);
	$db_connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//	echo 'db접속 성공!';
} catch (Exception $e) {
	echo 'db접속에 실패!!했습니다. 다시 시도 해야합니다.'.$e->getMessage();//;
}

?>  