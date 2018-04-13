<?php
if(!$_GET['date'])
{
	$_GET['date'] = date('Y-m-d H:i:s');
}

//0. ¼³Á¤
$mysql_hostname = '127.0.0.1';
$mysql_username = 'root';
$mysql_password = 'shinji42';
$mysql_database = 'test_database';
$mysql_port = '3306';
$mysql_charset = 'utf8';


$data = array();
$date = $_GET['date'];

$db = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);
$db->query('SET NAMES utf8');

for($i=0; $i<80; $i++)
{
	$res = $db->query('SELECT * FROM chat WHERE date > "' . $_GET['date'] . '"');

	if($res->num_rows > 0)
	{		
		while($v = $res->fetch_array(MYSQLI_ASSOC))
		{
			$data[] = $v;
			$date = $v['date'];
		}
		
		break;
	}
	
	usleep(250000);
}

echo json_encode(array('date' => $date, 'data' => $data));
?>