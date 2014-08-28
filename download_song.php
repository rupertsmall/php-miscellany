<?php

include 'my_php_script.php';

if (!(isset($_POST['auth']))) {
//return user to /index.php
header('Location: http://my_website.com');
exit;
}

else {

$tune=$_POST['tune_id'];
$auth=$_POST['auth'];
$mp3=download_tune($tune,$auth);

if ($mp3) {

$filename = "/home/my_website/tunes/".$mp3;
$file=file_get_contents($filename);
$flen=strlen($file);
header('Server: ');
header('X-Powered-By: ');
header("Content-Disposition: attachment; filename=\"$mp3.\"");
header("Last-Modified: ".date(DATE_RFC822));
header("ETag: ".uniqid());
header("Accept-Ranges: bytes");
header("Content-Length: ".$flen);
header("Connection: close");
header('Content-Description: File Transfer');
header("Pragma: public"); // required
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // required for certain browsers
header("Content-Transfer-Encoding: binary");
header("Content-Type: audio/mpeg");

ob_clean();
flush();

$file=file_get_contents($filename);
echo $file;
}
else {
 download_failure();
}
}

?>
