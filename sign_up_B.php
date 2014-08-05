<?php
include "structure.php" ;
$head = generate_head ("Sign Up");
echo "$head";
?>

<table border="0" align="center" cellpadding="1">
<tr>

<?php
$nav = generate_nav();
echo "$nav";
?>

<?php
$top = top ("Sign Up");
echo "$top";
?>


<table border="0" cellpadding="1">
<tr>
<td class="sign_up">
<form action="create_new_user.php" method=POST>
<p class="two">Name:  </p>
<input class="login" type="text" name="name" size="17" value="">
<p class="two"> Surname:  </p>
<input class="login" type="text" name="surname" size="17" value="">
</td>

<td class="sign_up">
<p class="two"> Email address:  </p>
<input class="login" type="text" name="email_address" size="30" value="">

<br><br>

<table border="0"><tr><td class="sign_up_radio" align="center">
<p class="two"> male  <input type="radio" name="gender" value="m" CHECKED> </p>
</td><td class="sign_up_radio" align="center">
<p class="two"> female  <input type="radio" name="gender" value="f"> </p>
</td></tr></table>
</td>
</tr>

<tr>
<td class="sign_up">
<p class="two"> username: </p>
<input class="login" type="text" name="user" size="17" value=""><br>
<p class="two"> password: </p>
<input class="login" type="password" name="password" size="17" value="">
<p class="two"> retype password: </p>
<input class="login" type="password" name="retype_password" size="17" value="">
</td>

<td class="sign_up" align="center">
<input class="button" type="submit" value="Sign Up" >
</form>
</td>
</tr>
</table>

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
