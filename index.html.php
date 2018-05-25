<?php
     /* Made by: Boschet Studios
        Date:    November 12, 1017
        File :   Index             
        Client:  Caudill's ATA   */
require ("session.inc");
$author = "Boschet Studios";
$dateWritten = "November 12 2017";
$description = "Caudill's ATA Home page";
$title = "Caudill's ATA";
$dbName = "projectMB";
require ("connect2db.inc.php");
require ("htmlHeadMeta.inc");

echo "<h1>Welcome to Caudill's Blackbelt Academy</h1>\n";

require ("nav.inc");

// Query Here
$query = "SELECT welcome
          FROM indexSetup";

$result = mysql_query($query) or
die ("<b>Query Failed</b><br />$query<br />" . mysql_error());

$row = mysql_fetch_row($result);
$welcome = $row[0]; 
// Row brackdonw Here

echo "<div>\n<p>$welcome</p>\n</div>\n";

$query = "SELECT imageFile,imageAlt,imageWidth,imageHeight
          FROM indexSetup";

$result = mysql_query($query) or
die ("<b>Query Failed</b><br />$query<br />" . mysql_error());

$row = mysql_fetch_row($result);

$imageOne  = $row[0];
$altOne    = $row[1];
$widthOne  = $row[2];
$heightOne = $row[3]; 

echo <<<PICDOC
<div class="col-7">
 <img src="images/$imageOne" alt="$altOne" width="$widthOne" height="$heightOne" />
</div>
PICDOC;

$query = "SELECT announceDate,announceBlurb 
          FROM announce
          WHERE active = 1";

$result = mysql_query($query) or
die ("<b>Query Failed</b><br />$query<br />" . mysql_error());



echo "<div class=\"col-8\">\n";
echo "<table id=\"nice\"\n";
echo "<tr>\n\t<th>Date</th>\n\t<th>Announcement</th>\n</tr>\n";
while ($row = mysql_fetch_row($result))
{
 $announceDate  = $row[0];
 $announceBlurb = $row[1];

 echo "<tr>\n";
 echo "\t<td>$announceDate</td>\n";
 echo "\t<td>$announceBlurb</td>\n";
 echo "</tr>\n";
}
echo "</table>\n";
echo "</div>\n";

require ("htmlFoot.inc");
mysql_close();
?> 
