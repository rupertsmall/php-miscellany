<?php
include "security_functions.php";

function generate_posts() {
$db_handle = secure_connect();
$command = "select post, username, to_char(posted_on, 'YYYY-mm-dd  hh:mm'), post_id from posts;";
$post_unresult = pg_query($db_handle, $command);
$rows = pg_num_rows($post_unresult);

for ($row=0; $row < $rows; $row++)
 {
 $post_result[1] = pg_fetch_result($post_unresult, $row, 0 );
 $post_result[2] = pg_fetch_result($post_unresult, $row, 1 );
 $post_result[3] = pg_fetch_result($post_unresult, $row, 2 );
 $post_result[4] = pg_fetch_result($post_unresult, $row, 3 );
 $html .= "<p class=\"posts\">"."\n";
 $html .= "Posted by: ".$post_result[2];
 $html .= "&nbsp; &nbsp; &nbsp; &nbsp &nbsp;";
 $html .= "Date: ".$post_result[3];
 $html .= "\n";
 $html .= "<br>".$post_result[1]."\n";
 $html .= "<input type=\"hidden\" name=\"post_id_number\" value=\"".$post_result[4]."\"> \n";
 $html .= "<pre>                                                </pre><input class=\"button\" type=\"submit\" value=\"flag\"> \n";
 $html .= "</p> \n";
 }

pg_close($db_handle);
pg_free_result($post_unresult);
return ($html);
}


?>
