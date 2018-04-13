<?php

$titleTag =" 한글제목 테스트";
$testText = "한글내용 테스트 꼭 인코딩은 UTF-8로 할것!!";

//0. 설정
$mysql_hostname = '127.0.0.1';
$mysql_username = 'root';
$mysql_password = 'shinji42';
$mysql_database = 'test_database';
$mysql_port = '3306';
$mysql_charset = 'utf8';


$data = array();
$date = $_GET['date'];

$db = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);

if ($db->connect_errno) {

// 실제 사이트는 에러 메시지를 보여주지 않지만 예로 한번 해보자.
echo "죄송합니다, 이 웹사이트에 문제가 발생했습니다.";

echo "Error: MySQL 접속이 실패했습니다. 에러정보는 다음과 같습니다.: <br/>";
echo "Errno: " . $mysqli->connect_errno . "<br/>";
echo "Error: " . $mysqli->connect_error . "\n";

exit;
}

$db->query('SET NAMES utf8');

$res = $db->query('SELECT * FROM chat');

$v = $res->fetch_array(MYSQLI_ASSOC);

printf("Host information: %s\n", mysqli_get_host_info($db));

?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <title> <?=$titleTag?></title>
    </head>
    
    <body>
   <?php echo $testText; ?>
   <br>
   <?php print_r ($v); ?>
    </body>
</html>
