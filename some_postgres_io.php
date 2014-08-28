<?php

function db_connect() {
$connect_string = "dbname=blah";
$db_handle = pg_connect($connect_string);
return ($db_handle);
}

function update_visitors($ip_addr, $browser) {
$db_handle = db_connect();
$psql_query = "insert into visitors values ('".$ip_addr."', now(), '".$browser."' );";
$psql_result = @pg_query($db_handle, $psql_query);
pg_close($db_handle);
pg_free_result($psql_result);
}

function clean_string($str) {
$str = str_replace("'","",$str);
$str = str_replace('"','',$str);
$str = str_replace(";","",$str);
$str = str_replace(" ","",$str);
$str = str_replace("\\","",$str);
$str = str_replace("\*","",$str);
$str = substr($str,0,min(strlen($str),119));
return ($str);
}

function not_blocked($ip_address) {
$db_handle = db_connect();
$psql_query = "select count(*) from submitted_events where ip_address='".$ip_address."' and now()-time < '1 hour';";
$psql_result = @pg_query($db_handle, $psql_query);
$result = pg_fetch_row($psql_result);
$number = intval($result[0]);
if ($number > 20) {$nb = 0;} // blocked
else { $nb = 1; } // not blocked
pg_close($db_handle);
pg_free_result($psql_result);
return ($nb);
}

function add_event($website, $ip_address) {
$db_handle = db_connect();
$psql_query = "insert into submitted_events values ('".$ip_address."', now(), '".$website."');";
$psql_result = @pg_query($db_handle, $psql_query);
pg_close($db_handle);
pg_free_result($psql_result);
}

function get_events() {
$color_1 = "ffffff";
$color_2 = "f6f6ef"; // in tribute to Hacker News
$db_handle = db_connect();
$psql_query = "select to_char(start_date, 'dd Mon yyyy'), website, event, country, to_char(start_date,'Month'), greatest((end_date-start_date)+interval '1 day', interval '1 day'), location from events order by start_date;";
$psql_result = @pg_query($db_handle, $psql_query);
$set_month = NULL;
$el_id = 1; // for toggling visability

while ($row = pg_fetch_array($psql_result)) {
if ($set_month == NULL) { // special case, first row
$set_month = $row[4];
$cell_bg = $color_1;
$html_string = "<tr><td colspan=3><b>".$set_month."</b></td></tr>\n";
print($html_string);
}

if ( $row[4] != $set_month ) {
$set_month = $row[4];
if ($cell_bg == $color_1) {$cell_bg = $color_2;}
else $cell_bg = $color_1;
$html_string = "<tr><td colspan=3 style=\"background-color: #".$cell_bg."\"><b>".$set_month."</b></td></tr>\n";
print($html_string);
}

$next = 3*$el_id-2;
$plus_id = $next;
$minus_id = ++$next;
$details_id = ++$next;

$html_string = "<blah/>";
print($html_string);
$html_string = "<blah blah/>";
print($html_string);
$el_id = ++$el_id;
}

pg_close($db_handle);
pg_free_result($psql_result);
}

?>
