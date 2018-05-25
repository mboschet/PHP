<?php
  /*    Author:    Boschet Students
        Date:      Dec. 9,2017
        File:      editStudent.php
        Discription: Pull up student infor to edit */

require("session.inc");

$accountID   = $_SESSION['accountN'];
$personID    = $_POST['person'];
$author      = "Boschet Studios";
$dateWritten = "Dec 9, 2017";
$description = "File for editing student information";
$title       = "Caudill's New Account Page";
$dbName      = "projectMB";

require("connect2db.inc.php");
require("htmlHeadMeta.inc");

$query = "SELECT firstName,lastName,birthday,gender,student,accountHolder
          FROM person
          WHERE personID = '$personID'";
$result = mysql_query($query) or
die ("<b>Query Failed</b><br />$query<br />" . mysql_error());

$found = ($row = mysql_fetch_row($result));
if (!$found)
{
 echo "<h1>No record found for $personID</h1>\n";
 require("nav.inc");
 echo "<p>Record for person $personID was not found.</p>\n";
 echo "<a href=account.html.php>Back to account page</a>\n";
 require ("htmlFoot.inc");
 die();
}
 $firstName = $row[0];
 $lastName  = $row[1];
 $bDay      = $row[2];
 $gender    = $row[3];
 $student   = $row[4];
 $accountH  = $row[5];

if ($gender == "m")
{
 $gm = "checked";
 $gf = null;
}
else
{
 $gf = "checked";
 $gm = null;
}

echo "<h1>Edit $firstName $lastName's information</h1>\n";

require("nav.inc");

echo <<<FORMDOC
<form action=editStudentUpdate.php method=post>
<fieldset>
 <legend>Update $firstName $lastName Record</legend>
 <p><label>ID Number</label>
    <input type="text" name="idnum" value="$personID" readonly="readonly" /></p>
 <p><label>First Name</label>
    <input type="text" name="fname" value="$firstName" /></p>
 <p><label>Last Name</label>
    <input type="text" name="lname" value="$lastName" /></p>
 <p><label>Berthday</label>
    <input type="date" name="bday" value="$bDay" /></p>
 <p><label>Gender</label>
    <input type="radio" name="gender" value="m" $gm> Male
    <input type="radio" name="gender" value="f" $gf> Female </p>
FORMDOC;
if ($student == 1)
{
 echo "<p><label>Is Student</label>\n ";
 echo "<input type=\"radio\" name=\"student\" value=\"1\" checked>Yes</p>\n";
}
else
{
 echo "<p><input type=\"checkbox\" name=\"student\" value=\"1\"> Become a Student</p>\n";
}

if ($accountH == 1)
{
 echo "<p><label>Is an Account Holder</label>\n ";
 echo "<input type=\"radio\" name=\"accountH\" value=\"1\">Yes</p>\n";
}
else
{
 echo "<p><input type=\"checkbox\" name=\"accountH\" value=\"1\"> Become an Account Holder</p>\n";
}

echo "</fieldset>\n";
echo "<p>\n<input type=reset name=reset value=Clear />\n";
echo "<input type=submit name=submit value=Update />\n";
echo "<a href=\"account.html.php\" title=\"Exit update\">Exit and don't save update</a></p>\n";
echo "</form>\n";

require("htmlFoot.inc");
mysql_close();
?>
