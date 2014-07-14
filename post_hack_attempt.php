#!/bin/php
<?php

$db_handle = secure_connect();
$command = "select posts from post_table where (posted_at-now()<'1 days' and username='$_SESSION[authorized_user]');";
$post_unresult = pg_query($db_handle, $command);
$rows = pg_num_rows($post_unresult);

if ($rows != 0) {
$post_result = pg_fetch_result($post_unresult, 0, 0 ); // posts 
if ( $post_result < 30) {
$new_posts = $post_result + 1;
$update_command = "update post_table set posts=$new_posts where (posted_at-now()<'1 days' and username='$_SESSION[authorized_user]');";
$post_unresult = pg_query($db_handle, $update_command);
$return_string = "CARRY_ON";
}
elseif ( $post_result >= 30 ) {
$return_string = "EXIT";
}
}

else {
$update_command = "insert into post_table values ('$_SESSION[authorized_user]', 1, now());";
$post_unresult = pg_query($db_handle, $update_command);
$return_string = "CARRY_ON";
}

pg_close($db_handle);
pg_free_result($post_unresult);
return($return_string);

?>
