<?php

$db_host = getenv('OPENSHIFT_MYSQL_DB_HOST');
$db_user = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
$db_pass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
$db_name = $_ENV['OPENSHIFT_APP_NAME'];
$db_port = $_ENV['OPENSHIFT_MYSQL_DB_PORT'];

@mysql_connect($db_host, 'adminqEJK4jV', 'wN4cCHPFzxDC');
mysql_select_db('hashmap') or die('Cant select database'.mysql_error());

echo "aqu------i";
if ($_POST) {

	$key   = $_REQUEST['key'];
	$value = $_REQUEST['value'];
  echo "la query: "."INSERT INTO hashmap VALUES ('{$key}','{$value})'";
	$result = mysql_query("INSERT INTO hashmap VALUES ('{$key}','{$value})'");
}

?>