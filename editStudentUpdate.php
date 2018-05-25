<?php  
 /* Author:   Boschet Studios
    Date:     Dec. 10, 2017
    File:     editStudentUpdate.php
 */
require ("session.inc");

$accountID = $_SESSION['accountN'];
$personID  = mysql_real_escape_string($_POST['idnum']);
$firstName = mysql_real_escape_string($_POST['fname']);
$lastName  = mysql_real_escape_string($_POST['lname']);
$birthday  = $_POST['bday'];
$gender    = $_POST['gender'];
$student   = $_POST['student'];
$accountH  = $_POST['accountH'];
$dbName    = "projectMB";

require ("connect2db.inc.php");

$query = "UPDATE person
          SET personID      = '$personID',
              firstName     = '$firstName',
              lastName      = '$lastName',
              birthday      = '$birthday',
              gender        = '$gender',
              student       = '$student',
              accountHolder = '$accountH'
        WHERE personID      = '$personID'";

$result = mysql_query($query) or 
die ("<b>Query Failed.</b><br />$query<br />" . mysql_error());

header("location:account.html");
mysql_close();
?>
