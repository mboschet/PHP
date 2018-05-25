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
echo "<h1>Caudill's Classes and Times</h1>\n";
require ("nav.inc");

$query = "SELECT day,startTime,endTime,ages,belts,restrictions
          FROM schedul
          WHERE active = 1";

$result = mysql_query($query) or
die ("<b>Query Failed</b><br />$query<br />" . mysql_error());

echo "<table id=\"nice\">\n";
echo "<legend>Classes avaliable</legend>\n";
echo "<tr>\n \t<th>Day</th>\n \t<th>Start Time</th>\n";
echo "\t<th>End Time</th>\n \t<th>Ages</th>\n \t<th>Belts</th>\n";
echo "\t<th>Restrictions</th>\n </tr>\n";

while ($row = mysql_fetch_row($result))
{
 $day          = $row[0];
 $startTime    = $row[1];
 $endTime      = $row[2];
 $ages         = $row[3];
 $belts        = $row[4];
 $restrictions = $row[5];

 echo "<tr>\n \t<td>$day</td>\n \t<td>$startTime</td>\n";
 echo "\t<td>$endTime</td>\n \t<td>$ages</td>\n";
 echo "\t<td>$belts</td>\n \t<td>$restrictions</td>\n </tr>\n";
}
echo "</table>\n";
require ("htmlFoot.inc");
mysql_close();
?> 
