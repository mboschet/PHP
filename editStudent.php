<?php
  /*    Author:    Boschet Students
        Date:      Dec. 9,2017
        File:      editStudent.php
        Discription: Pull up student infor to edit */

require("session.inc");

$accountID   = $_SESSION['accountN'];
$author      = "Boschet Studios";
$dateWritten = "Dec 9, 2017";
$description = "File for editing student information";
$title       = "Caudill's New Account Page";
$dbName      = "projectMB";

require("connect2db.inc.php");
require("htmlHeadMeta.inc");

echo "<h1>Edit information</h1>\n";

require("nav.inc");

$query = "SELECT personID,firstName,lastName,birthday,gender,student,accountHolder
          FROM person
          WHERE accountID = '$accountID'";
$result = mysql_query($query) or
die ("<b>Query Failed</b><br />$query<br />" . mysql_error());

echo <<<TABLEDOC
<form action=editStudentInfo.php method=post>
 <fieldset>
 <legend>Edit Account People</legend>
 <table>
 <tr>
  <th>Select</th>
  <th>Name</th>
  <th>Birthday</th>
  <th>Gender</th>
  <th>Student</th>
  <th>Account Holder</th>
 </tr>
TABLEDOC;

while ($row = mysql_fetch_row($result))
{
 $personID  = $row[0];
 $firstName = $row[1];
 $lastName  = $row[2];
 $bDay      = $row[3];
 $gender    = $row[4];
 $student   = $row[5];
 $accountH  = $row[6];

 echo "<tr>\n";
 echo "\t<td><input type=radio name=person value=$personID />\n";
 echo "\t<td>$firstName $lastName</td>\n";
 echo "\t<td>$bDay</td>\n";
 echo "\t<td>$gender</td>\n";
 echo "\t<td>$student</td>\n";
 echo "\t<td>$accountH</td>\n";
 echo "</tr>\n";
}
echo "</table>\n";
echo "</fieldset>\n";

echo "<p>\n<input type=reset name=reset value=Clear />\n";
echo "<input type=submit name=submit value=Edit />\n</p>\n";
echo "</form>\n";
require("htmlFoot.inc");
mysql_close();
?>
