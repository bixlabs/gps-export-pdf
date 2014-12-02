<?php

$db_host = getenv('OPENSHIFT_MYSQL_DB_HOST');
$db_user = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
$db_pass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
$db_name = $_ENV['OPENSHIFT_APP_NAME'];
$db_port = $_ENV['OPENSHIFT_MYSQL_DB_PORT'];

@mysql_connect($db_host, 'adminqEJK4jV', 'wN4cCHPFzxDC');
mysql_select_db('hashmap') or die('Cant select database'.mysql_error());

if ($_POST) {

	$key   = $_REQUEST['key'];
	$value = $_REQUEST['value'];

	$result = mysql_query("INSERT INTO hashmap VALUES ('{$key}','{$value}')");
} else {
  $result = mysql_query("SELECT value FROM hashmap where thekey = '{$key}'");
  $row = mysql_fetch_array($result, MYSQL_ASSOC);
  echo $row["value"];
}
?>