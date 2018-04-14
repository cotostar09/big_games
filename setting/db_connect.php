<?php
//0. ¼³Á¤
$mysql_hostname = '127.0.0.1';
$mysql_username = 'root';
$mysql_password = 'shinji42';
$mysql_database = 'big_games';
$mysql_port = '3306';
$mysql_charset = 'utf8';

$db = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port);
$db->query('SET NAMES utf8');

?>