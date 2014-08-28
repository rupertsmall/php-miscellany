<?php

include 'whatever_is_needed.php';

function make_stylesheet() {
$base = ".main_body { background-color: #007300;}
.main_table { width: 608px; margin-left: auto; margin-right: auto; border-width: 1px solid white;}
.main_table_white { background-color: #ccff99; color:black; padding: 2px 5px;}
.main_table_green { background-color: #99ff99; color:black; padding: 2px 5px;}
.float_right { float: right; }
.buy_link {color: white;}
.sort_results {display:inline;}
.download_writing {position:fixed; top: 180px; right: 10px;}
.search_bar {display: inline; position: relative; float: right;}
.social_buttons {display:inline; position: relative; left: 0px;}
.buy_catalogue_div {width: 578px; display:inline-block; background-color: white; color: black; padding: 15px; border-radius: 5px; }
.small_print { font-size: .8em; display:inline;}\n";

$handle = secure_connect();
$psql_query = "select song_id from my_mp3_db;";
$result = @pg_query($handle, $psql_query);
$fandle = fopen("style.css","w");
fwrite($fandle,$base);
while ($row = pg_fetch_array($result)) {
 $dynamic_style = "#download_instructions_".$row[0]." {display: none; position: fixed; top: 180px; right: 0px; width: 200px; padding: 15px 15px 5px 15px; background-color: white; border: 2px solid black; -moz-border-radius: 10px; font-size: .7em; }\n#button_event_green_".$row[0]." { display:inline; cursor: pointer; }\n#button_event_red_".$row[0]." { display: none; cursor: pointer; border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; position: fixed; top: 195px; right: 230px;}\n#beg_rotated_".$row[0]." { display: none; cursor: pointer;}";
 fwrite($fandle,$dynamic_style);
}
fclose($fandle);
pg_close($handle);
pg_free_result($result);
}

make_stylesheet();

?>
