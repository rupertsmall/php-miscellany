<?php

function secure_connect() {
$connect_string = "dbname=mywebsite_db user=website_db_user password=something_you_would_never_guess";
$db_handle = pg_connect($connect_string);
return ($db_handle);
}

function encrypt_pass($username, $name, $surname, $gender, $password) {
$salt = $name.$surname.$gender."q89uzjx0awmo914sckyli7r5pfdeu3v";
$blowfish_salt = "$"."2a"."$"."07"."$".substr($salt, 0, CRYPT_SALT_LENGTH);
$pass = crypt($password, $blowfish_salt );
$username = $username;  // PHP seems to want me to do something with the username to halt errors...
return ($pass);
}

function authenticate() {
$hack_instructions = login_hack_check();
if ($hack_instructions == "EXIT")
{
$status = "FALSE";
login_hack();
}

else {

$db_handle = secure_connect();
$psql_query = "select username, password, name, surname, gender from users where username='$_POST[user]';";
$post_unresult = @pg_query($db_handle, $psql_query);
if (!$post_unresult || $post_unresult == "FALSE")
{
$status = "FALSE";
login_hack();
}
else {
$post_result_username = pg_fetch_result($post_unresult, 0, 0);
$post_result_password = pg_fetch_result($post_unresult, 0, 1);
$post_result_name = pg_fetch_result($post_unresult, 0, 2);
$post_result_surname = pg_fetch_result($post_unresult, 0, 3);
$post_result_gender = pg_fetch_result($post_unresult, 0, 4);
$pass = encrypt_pass($post_result_username, $post_result_name, $post_result_surname, $post_result_gender, $_POST["password"]);
 if (strcmp($pass, $post_result_password ) == 0)
{
$_SESSION["authorized_user"] = $_POST["user"];
$_SESSION["password"] = $pass;
$status = "TRUE";
}
 else
{
$status = "FALSE";
login_hack();
}
}
pg_close($db_handle);
pg_free_result($post_unresult);
}
return($status);
}

function authenticate_set() {
$hack_instructions = login_hack_check();
if ($hack_instructions == "EXIT")
{
$status = "FALSE";
login_hack();
}

else {

$db_handle = secure_connect();
$psql_query = "select username, password from users where username='$_SESSION[authorized_user]';";
$post_unresult = @pg_query($db_handle, $psql_query);
if (!$post_unresult || $post_unresult == "FALSE")
{
$status = "FALSE";
login_hack();
}
else {
$post_result_username = pg_fetch_result($post_unresult, 0, 0);
$post_result_password = pg_fetch_result($post_unresult, 0, 1);
 if (strcmp($_SESSION["password"], $post_result_password ) == 0)
 {
 $status = "TRUE";
 }
 else {
$status = "FALSE";
login_hack();
      }
}
pg_close($db_handle);
pg_free_result($post_unresult);
}
return ($status);
}

function login_hack() {
$ip = $_SERVER["REMOTE_ADDR"];
$db_handle = secure_connect();

$command = "select tries from login_table where (tried_at-now()<'1 days' and user_ip='$ip');";
$post_unresult = pg_query($db_handle, $command);
$post_result = pg_fetch_result($post_unresult, 0, 0 ); // tries
$rows = pg_num_rows($post_unresult);

if ($rows != 0) {
$new_tries = $post_result + 1;
$update_command = "update login_table set tries=$new_tries where (tried_at-now()<'1 days' and user_ip='$ip');";
$post_unresult = pg_query($db_handle, $update_command);
}

else {
$update_command = "insert into login_table values ('$ip', 1, now());";
$post_unresult = pg_query($db_handle, $update_command);
}
}

function login_hack_check() {
$ip = $_SERVER["REMOTE_ADDR"];
$db_handle = secure_connect();
$command = "select tries from login_table where (tried_at-now()<'1 days' and user_ip='$ip');";
$post_unresult = pg_query($db_handle, $command);
$rows = pg_num_rows($post_unresult);

if ($rows != 0) {
$post_result = pg_fetch_result($post_unresult, 0, 0 );
if ( $post_result <= 6) {
$return_string = "CARRY_ON";
}
else { 
$return_string = "EXIT";
}
}
return($return_string);
}

?>
