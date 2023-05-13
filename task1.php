<?php 

function strCheck($p_value, $p_regexp, $p_fname) {
	$str = "";

    if (preg_match($p_regexp, $p_value, $match)) 
    	$str = $p_fname . ": " . $match[0] . "<br>";
    else 
    	$str = "Field incorrect: " . $p_fname . " " . $p_value . "<br>";

    return $str;
}

$res_str = "";

$regexp = "/^([А-ЯЁ]{1})([а-яё]+)$/u";

$names = explode(" ", $_POST["name"]);

$res_str .= strCheck($names[0], $regexp, "First Name");
$res_str .= strCheck($names[1], $regexp, "Second Name");
$res_str .= strCheck($names[2], $regexp, "Middle Name");

$regexp = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$res_str .= strCheck($_POST["email"], $regexp, "E-Mail");

$regexp = "/^((\+7|8)+([0-9]){10})$/";
$res_str .= strCheck($_POST["phone"], $regexp, "Phone");

echo $res_str;

?>

