<?php
 /* Author: Matthew Boschet
    Date: 11/4/2017
    File:  nave.inc
    Description:  Creates the nave pain based on permitions.
 */

$userName = $_SESSION['userName'];
$accountN = $_SESSION['accountN'];
$sitePermit = $_SESSION['sitePermit'];

if (empty($userName))
{
echo <<<HEREDOC
<ul>
 <li class="col-6"><a href="logIn.html" title="Log In button">Log in</a></li>
 <li class="col-6"><a href="signUp.html" title="Sign Up button">Create account</a></li>
</ul>
HEREDOC;
}
else
{
echo <<<HEREDOC
<ul>
 <li class="col-3" style="color:rgb(255,239,213);">Username: $userName</li>
 <li class="col-3" style="color:rgb(255,239,213);">Account Number: $accountN</li>
 <li class="col-3"></li>
 <li class="col-3"><a href="signOut.php" title="Sign out button">Sign out</a></li>
</ul>
HEREDOC;
}
if ($sitePermit == "ST")
{
	$navNum = 1;
        $col = "col-2";
}

elseif ($sitePermit == "AH")
{ 
	$navNum = 2;
        $col = "col-2";
}

elseif ($sitePermit == "IN")
{
	$navNum = 3;
        $col = "col-1";
}

elseif ($sitePermit == "SM")
{
	$navNum = 4;
        $col = "col-1";
}

elseif ($sitePermit == "OW")
{
	$navNum = 5;
        $col = "col-1";
}
else
{
        $navNum = 0;
        $col = "col-3";
}
$query ="SELECT position, linkText, pageName, titleText, level
         FROM naveDB
	 WHERE level <= $navNum" ;
			 
$result = mysql_query($query) or
 die("<b>Query Failed.</b><br />$query<br />" . mysql_error());

echo "<ul>\n";

while ($row = mysql_fetch_row($result))
{
  $linkText  = $row[1];
  $pageName  = $row[2];
  $titleText = $row[3];
		
 echo "<li class=$col><a href=\"$linkText\" title=\"$titleText\">$pageName</a></li>\n";		
}
echo "</ul>\n"; 
	 
?>
