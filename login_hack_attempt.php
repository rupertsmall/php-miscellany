#!/bin/php
<?php
$ip = $_SERVER["REMOTE_ADDR"];
$db_handle = secure_connect();
$command = "select tries from login_table where (tried_at-now()<'1 days' and user_ip='$ip');";
$post_unresult = pg_query($db_handle, $command);
$rows = pg_num_rows($post_unresult);

if ($rows != 0) {
$post_result = pg_fetch_result($post_unresult, 0, 0 ); // tries
if ( $post_result < 6) {
$new_tries = $post_result + 1;
$update_command = "update login_table set tries=$new_tries where (tried_at-now()<'1 days' and user_ip='$ip');";
$post_unresult = pg_query($db_handle, $update_command);
$return_string = "CARRY_ON";
}
elseif ( $post_result >= 6)
$return_string = "EXIT";
}

else {
$update_command = "insert into login_table values ('$ip', 1, now());";
$post_unresult = pg_query($db_handle, $update_command);
$return_string = "CARRY_ON";
}

pg_close($db_handle);
pg_free_result($post_unresult);
return($return_string);
?>
