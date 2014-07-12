 

<?php


include "structure.php";

function flag_post_execute($post_id_number) {
$db_handle = secure_connect();
$command_for_dims = "select array_upper(flaggers, 1) from posts where post_id=$post_id_number;";
$post_unresult = pg_query($db_handle, $command_for_dims);
$array_dim = pg_fetch_result($post_unresult, 0, 0);

$has_flagged_before = "NO";
for ($dim=0; $dim<$array_dim; $dim++)
{
$command_for_results = "select flaggers[$dim+1] from posts;";
$post_unresult = pg_query($db_handle, $command_for_results);
$result = pg_fetch_result($post_unresult, 0, 0);
if (strcasecmp($_SESSION["authorized_user"], $result))
 {
 $has_flagged_before = "YES";
 }
}

if ($has_flagged_before == "NO")
{
$insert_flag = "update posts set flaggers[$array_dim+1]='$_SESSION[authorized_user]' where post_id=$post_id_number;";
$post_unresult = pg_query($db_handle, $insert_flag);
$update_flags = "update posts set flags=array_upper(flaggers, 1) where post_id=$post_id_number;";
$post_unresult = pg_query($db_handle, $update_flags);
$html = "<html><body><META HTTP-EQUIV=\"refresh\" ";
$html .= "content=\"0;URL=http://mywebsite.com/index.php\"></body></html>";
}

else {
$html = "<html><META HTTP-EQUIV=\"refresh\" ";
$html .= "content=\"0;URL=http://mywebsite.com/index.php\"></html>";
}

pg_close($db_handle);
pg_free_result($post_unresult);
return($html);
}
?>
