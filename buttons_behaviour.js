

function green_button_click(song_id, all_id) {
var elstring_green = "button_event_green_"+song_id;
var elstring_rotated = "beg_rotated_"+song_id;
var instruction_string = "download_instructions_"+song_id;
var elstring_red = "button_event_red_"+song_id;
var i;
var green;
var rotated;
var instruction;
var red;

document.getElementById(elstring_green).style.display="none"; document.getElementById(elstring_rotated).style.display="inline";
document.getElementById(elstring_red).style.display="inline"; document.getElementById(instruction_string).style.display="inline";
id_array = all_id.split('.');
id_len = id_array.length;
for(i=1;i<=id_len;i++) {
 if (!(id_array[i] == song_id)) {
  green = "button_event_green_"+id_array[i];
  rotated = "beg_rotated_"+id_array[i];
  instruction = "download_instructions_"+id_array[i];
  red = "button_event_red_"+id_array[i];
  document.getElementById(green).style.display="inline"; document.getElementById(rotated).style.display="none";
  document.getElementById(red).style.display="none"; document.getElementById(instruction).style.display="none";
  }
}
}

function red_button_click(song_id) {
var elstring_green = "button_event_green_"+song_id;
var elstring_red = "button_event_red_"+song_id;
var instruction_string = "download_instructions_"+song_id;
var elstring_rotated = "beg_rotated_"+song_id;

document.getElementById(elstring_red).style.display="none"; document.getElementById(elstring_green).style.display="inline";
document.getElementById(instruction_string).style.display="none";
document.getElementById(elstring_rotated).style.display="none";
}

function rotated_button_click(song_id) {
var elstring_green = "button_event_green_"+song_id;
var elstring_red = "button_event_red_"+song_id;
var instruction_string = "download_instructions_"+song_id;
var elstring_rotated = "beg_rotated_"+song_id;

document.getElementById(elstring_red).style.display="none"; document.getElementById(elstring_green).style.display="inline";
document.getElementById(instruction_string).style.display="none";
document.getElementById(elstring_rotated).style.display="none";
}
