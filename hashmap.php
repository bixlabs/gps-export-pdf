<?php

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && (   
       $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'POST' || 
       $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'DELETE' || 
       $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'PUT' )) {
             header('Access-Control-Allow-Origin: *');
             header("Access-Control-Allow-Credentials: true"); 
             header('Access-Control-Allow-Headers: X-Requested-With');
             header('Access-Control-Allow-Headers: Content-Type, application-id');
             header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT'); // http://stackoverflow.com/a/7605119/578667
             header('Access-Control-Max-Age: 86400'); 
      }
  exit;
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: http://localhost');
header("Access-Control-Allow-Credentials: true"); 
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Headers: Content-Type, application-id');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT'); // http://stackoverflow.com/a/7605119/578667
header('Access-Control-Max-Age: 86400'); 

$db_host = getenv('OPENSHIFT_MYSQL_DB_HOST');

@mysql_connect($db_host, 'adminqEJK4jV', 'wN4cCHPFzxDC');
mysql_select_db('hashmap') or die('Cant select database'.mysql_error());

if ($_POST) {

	$key   = $_REQUEST['key'];
	$value = $_REQUEST['value'];

	$result = mysql_query("INSERT INTO hashmap VALUES ('{$key}','{$value}')");
} else {

  $key   = $_REQUEST['key'];
  $result = mysql_query("SELECT value FROM hashmap where thekey = '{$key}'");
  $row = mysql_fetch_array($result, MYSQL_ASSOC);
  echo $row["value"];
}
?>