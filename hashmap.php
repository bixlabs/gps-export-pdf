<?php

/*
Please make note of these MySQL credentials again:
  Root User: adminqEJK4jV
  Root Password: wN4cCHPFzxDC
URL: https://exporthtmlto-bixsolutions.rhcloud.com/phpmyadmin/

       Root User: adminqEJK4jV
   Root Password: wN4cCHPFzxDC
   Database Name: exporthtmlto

Connection URL: mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/
*/
$db_host = $_ENV['OPENSHIFT_MYSQL_DB_HOST'];
$db_user = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
$db_pass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
$db_name = $_ENV['OPENSHIFT_APP_NAME'];
$db_port = $_ENV['OPENSHIFT_MYSQL_DB_PORT'];

echo "aca si lelga";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo "aqu------i";
if ($_POST) {

	$key   = $_REQUEST['key'];
	$value = $_REQUEST['value'];

	if (($stmt = $mysqli->prepare("INSERT INTO hashmap(key, value) VALUES (?,?)")) && $stmt->bind_param("ss", $key, $value) &&
		 $stmt->execute()) {
		echo "success!";
	}

	$stmt->close();
}

?>