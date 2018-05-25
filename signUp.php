<?php


$firstName = mysql_real_escape_string($_POST['fname']);
$lastName  = mysql_real_escape_string($_POST['lname']);
$berthD    = mysql_real_escape_string($_POST['bday']);
$phoneN    = mysql_real_escape_string($_POST['phone']);
$phoneText = mysql_real_escape_string($_POST['textN']);
$gender    = $_POST['gender'];
$accountH  = 1;
$salt      = (int) date("s");
$pepper    = "@><@";
$password  = md5($salt . $_POST['password'] . $pepper);

if($_POST['studentT'] === 1)
{
 $student = 0;
}
else if ($_POST['studentT'] === 2)
{
 $student = 1;
}

$userNp1 = substr($firstName,0,3);
$userNp2 = substr($lastName,0,3);
$userNp3 = 1;
$userName = $userNp1 . "." . $userNp2 . $userNp3;

$address = mysql_real_escape_string($_POST['address']);
$city    = mysql_real_escape_string($_POST['city']);
$state   = mysql_real_escape_string($_POST['state']);
$zipcode = mysql_real_escape_string($_POST('zip']);
$email   = mysql_real_escape_string($_POST('email']);


?>