<?php
include "structure.php" ;
$head = generate_head ("Comment Posted");
echo "$head";
?>

<table border="0" align="center" cellpadding="1">
<tr>

<?php
$nav = generate_nav();
echo "$nav";
?>

<?php
$top = top ("Comment Posted");
echo "$top";
?>

<p class="four">
Thankyou for your comment - it has been saved. You will be redirected to the <a class="blue_link" href="index.php">main page</a> shortly.
</p>

<META HTTP-EQUIV="refresh" content="3;URL=index.php">

<?php
$bottom = bottom();
echo "$bottom";
?>

<td class="right" valign="top">
</td>
</tr>
</table>
</body>
</html>
