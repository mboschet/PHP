<?php
     /* Made by: Boschet Studios
        Date:    November 12, 1017
        File :   Index             
        Client:  Caudill's ATA   */
require("session.inc");
$author = "Boschet Studios";
$dateWritten = "November 12 2017";
$description = "Caudill's ATA Home page";
$title = "Caudill's ATA";
$dbName = "projectMB";

require ("connect2db.inc.php");
require ("htmlHeadMeta.inc");

echo "<h1>Contact Us</h1>\n";

require ("nav.inc");

echo "<p>Questions, comments, concerns?  We'd love to hear from you, so fell free to contact us.</p>\n";
echo "<div class=\"col-5\">\n";
echo "<p>307 W. Market St.<br />Warsaw, IN 46580</p>\n";
echo "<p><br />(574)268-8480 / (574) 551-7289</p>\n";
echo "<p>Find us on <a href=\"https://www.facebook.com/caudillsata\">FaceBook</a></p>\n";
echo "</div>\n";

require ("htmlFoot.inc");
mysql_close();
?>

