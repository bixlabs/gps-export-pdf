<?php

$openshift = true;
if ($openshift) {
  $domain = 'http://investigo-bix.rhcloud.com';
  $run_command = '~/app-root/data/phantomjs/bin/phantomjs generatePDF.js';
} else {
  $domain = 'http://localhost/investigo';
  $run_command = 'phantomjs generatePDF.js';
}

$url = $domain.'/technicalSupportForm/index.html?'.$_SERVER['QUERY_STRING'];  //.$_SERVER['QUERY_STRING'];
if (isset($_REQUEST['url'])) {
  $url = $_REQUEST['url'];
}

$fileNameAndExtension = 'form.pdf';
if (isset($_REQUEST['fileNameAndExtension'])) {
  $fileNameAndExtension = $_REQUEST['fileNameAndExtension'];
}

$allcommand = $run_command.' "'.$url.'" '.$fileNameAndExtension;
exec($allcommand);
echo "{formUrl:'{$domain}/technicalSupportForm/{$fileNameAndExtension}'}";
?>