<?php
if (session_id() == "")
 session_start();

include "structure.php" ;

if (isset($_SESSION["authorized_user"]) && isset($_SESSION["password"]))   {
$authenticated = authenticate_set();
}
elseif ( $_POST["user"] && $_POST["password"] ) {
$authenticated = authenticate();
}
else { $authenticated = "NOTSET"; }

if ($authenticated == "FALSE") {$error_message = "Incorrect username/password.";}
if ($authenticated == "NOTSET") {$error_message = "Please login to flag a post.";}

if (($authenticated == "FALSE") || ($authenticated == "NOTSET"))
{
$head = generate_head ("Login");
echo "$head";
?>

<table border="0" align="center" cellpadding="1">
<tr>

<?php
$nav = generate_nav();
echo "$nav";
?>

<?php
$top = top ("Login to enable flagging");
echo "$top";
?>

<?php
echo "<pre>\n\n\n\n\n\n\n\n\n\n\n\n</pre>";
echo "<p class=\"warning\">".$error_message."</p>";
?>

<?php
$login_html = login_screen_open("flag_post.php");
echo $login_html;
?>
<input type="hidden" name="post_id_number" value="<?php echo $_POST["post_id_number"]; ?>" >

<?php
$login_html_end = login_screen_close();
echo $login_html_end;
?>

<?php
$bottom = bottom();
echo "$bottom";
?>

<td class="right">
</td>
</tr>
</table>
</body>
</html>

<?php
}

else  //  ($authenticated == "TRUE")
{
$html = flag_post_execute();
echo $html;
}

?>
