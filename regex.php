<?php

$compatible = regex_1 ("morri98.-_");
echo $compatible;

function regex_1 ($word) {
$pattern = "^[a-zA-Z0-9._-]{3,17}$";
if (eregi($pattern , $word))
 $compatible = "YES";
else $compatible = "NO";
return ($compatible);
}

function regex_2 ($word) {
$pattern = "^[a-zA-Z0-9._-]{5,30}$";
if (eregi($pattern , $word))
 $compatible = "YES";
else $compatible = "NO";
return ($compatible);
}


?>
