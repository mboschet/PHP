<?php
 /* Author: Matthew Boschet
    Date: 11/4/2017
	File:  nave.inc
	Description:  Creates the nave pain based on permitions.
*/

$navNum = 0;


if ($sitePermit === "ST")
{
	$navNum = 1;
}

elseif ($sitePermit === "NC")
{
	$navNum = 2;
}

elseif ($sitePermit === "AH")
{ 
	$navNum = 3;
}

elseif ($sitePermit === "IS")
{
	$navNum = 4;
}

elseif ($sitePermit === "SM")
{
	$navNum = 5;
}

elseif ($sitePermit === "OW")
{
	$navNum = 6;
}

    $query ="SELECT position, linkText, pageName, titleText, level
	         FROM naveDB
			 ORDER BY position
			 WHERE level >= $navNum";
			 
	$result = mysql_query($query) or
    die("<b>Query Failed.</b><br />$query<br />" . mysql_error());
	  
	echo "<ul>";

	while ($row = mysql_fetch_row($result))
	{
		$linkText  = $row[1];
		$pageName  = $row[2];
		$titleText = $row[3];
		
		echo "<li><a href=\"$linkText\" title=\"$titleText\">$pageName</a></li>\n";		
	}
	echo "</ul>\n"; 
	 
?>