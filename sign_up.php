<?php

function generate_sign_up_with_errors ( $error_tag ) {
$html = generate_head ("Sign Up");
$html .= "\n <table width=\"100%\" border=\"0\" cellpadding=\"1\">";
$html .= "<tr>";
$html .= generate_nav();
$html .= top ("Sign Up");
$html .= "<p class=\"warning\">".$error_tag."</p>";
$html .= "<table border=\"0\" cellpadding=\"1\">";
$html .= "<tr>";
$html .= "<td class=\"sign_up\">";
$html .= "<form action=\"create_new_user.php\" method=POST>";
$html .= "<p class=\"two\">Name:  </p>";
$html .= "<input class=\"login\" type=\"text\" name=\"name\" size=\"17\" value=\"\">";
$html .= "<p class=\"two\"> Surname:  </p>";
$html .= "<input class=\"login\" type=\"text\" name=\"surname\" size=\"17\" value=\"\">";
$html .= "</td>";
$html .= "<td class=\"sign_up\">";
$html .= "<p class=\"two\"> Email address:  </p>";
$html .= "<input class=\"login\" type=\"text\" name=\"email_address\" size=\"30\" value=\"\">";
$html .= "<br><br>";
$html .= "<table border=\"0\"><tr><td class=\"sign_up_radio\" align=\"center\">";
$html .= "<p class=\"two\"> male  <input type=\"radio\" name=\"gender\" value=\"m\" CHECKED> </p>";
$html .= "</td><td class=\"sign_up_radio\" align=\"center\">";
$html .= "<p class=\"two\"> female  <input type=\"radio\" name=\"gender\" value=\"f\"> </p>";
$html .= "</td></tr></table>";
$html .= "</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class=\"sign_up\">";
$html .= "<p class=\"two\"> username: </p>";
$html .= "<input class=\"login\" type=\"text\" name=\"user\" size=\"17\" value=\"\"><br>";
$html .= "<p class=\"two\"> password: </p>";
$html .= "<input class=\"login\" type=\"password\" name=\"password\" size=\"17\" value=\"\">";
$html .= "<p class=\"two\"> retype password: </p>";
$html .= "<input class=\"login\" type=\"password\" name=\"retype_password\" size=\"17\" value=\"\">";
$html .= "</td>";
$html .= "<td class=\"sign_up\" align=\"center\">";
$html .= "<input class=\"button\" type=\"submit\" value=\"Sign Up\" >";
$html .= "</form>";
$html .= "</td>";
$html .= "</tr>";
$html .= "</table>";
$html .= bottom();
$html .= "<td class=\"right\" valign=\"top\">";
$html .= "</td>";
$html .= "</tr>";
$html .= "</table>";
$html .= "</body>";
$html .= "</html>";

return ($html);
}

?>
