<?php
include "structure.php" ;
$head = generate_head ("Limit Exceeded");
echo "$head";
?>

<table border="0" align="center" cellpadding="1">
<tr>

<?php
$nav = generate_nav();
echo "$nav";
?>

<?php
$top = top ("Post Limit Exceeded");
echo "$top";
?>

<p class="four">
Sorry: You have exceeded the maximum post limit of 30 posts per 24 hours. Your post will not be saved.
This is to ensure the security of the website.
<br><br>
<a class="blue_link" href="index.html">Return to Main Page</a>

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
