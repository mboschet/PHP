<?php
  /* Author:		Matthew Boschet
     Program:       htmlHead.inc
	 Date:          11/04/2017
	 Description:   Include file for header that also adds coments
  */
	
  echo "<!doctype html> <!-- Author:          $author -->\n";
  echo "<html lang=\"en\"> <!-- Date Written: $dateWritten -->\n";
  echo "<head>           <!-- Description:   $description -->\n";
  echo "\t<title>$title</title>\n";
  echo "\t<meta charset=\"utf-8\"/>\n";
  echo "\t<meta name=\"keywords\" content=\"$keywordList\" />\n";
  echo "\t<meta name=\"description\" content=\"$description\" />\n";
  echo "\t<link rel=\"stylesheet\" href=\"chapter$chapter.css\"/>\n";
  echo "</head>\n";
  echo "<body>\n";
  echo "<div id=\"wrapper\">\n";
?>