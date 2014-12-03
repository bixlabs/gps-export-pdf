<?php

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && (   
       $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'POST' || 
       $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET' || 
       $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'DELETE' || 
       $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'PUT' )) {
             header('Access-Control-Allow-Origin: *');
             header("Access-Control-Allow-Credentials: true"); 
             header('Access-Control-Allow-Headers: X-Requested-With');
             header('Access-Control-Allow-Headers: application-id, accept, secret-key, user-token, content-type');
             header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT'); // http://stackoverflow.com/a/7605119/578667
             header('Access-Control-Max-Age: 86400'); 
      }
  exit;
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true"); 
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Headers: application-id, accept, secret-key, user-token, content-type');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT'); // http://stackoverflow.com/a/7605119/578667
header('Access-Control-Max-Age: 86400'); 

$openshift = true;
if ($openshift) {
  $fileNameAndExtension = 'form.pdf';
  $domain = 'http://exporthtmlto-bixsolutions.rhcloud.com';
  $run_command = '~/app-root/data/phantomjs/bin/phantomjs generatePDF.js';
} else {
  $fileNameAndExtension = 'form.pdf';
  $domain = 'http://localhost/investigo/technicalSupportForm';
  $run_command = 'phantomjs generatePDF.js';
}

$url = $domain.'/technicalSupportForm/index.html?'.$_SERVER['QUERY_STRING'];  //.$_SERVER['QUERY_STRING'];
if (isset($_REQUEST['url'])) {
  $url = $_REQUEST['url'];
}

$params = '';
if ($_REQUEST['params']) {
  $params = urldecode($_REQUEST['params']);
}

if (isset($_REQUEST['fileNameAndExtension'])) {
  $fileNameAndExtension = $_REQUEST['fileNameAndExtension'];
}

$allcommand = $run_command.' "'.$url.'" '.$fileNameAndExtension . ' ' . $params;
exec($allcommand);
echo $domain.'/'.$fileNameAndExtension;
?>