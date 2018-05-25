<?php

/*  Author: Boschet Studios
    Date:   November 23, 2017
	File:   session.inc  
*/

session_start();
if (!isset($_SESSION['userName']))
{
 $_SESSION['userName'];
 $_SESSION['sitePermit'];
 $_SESSION['studentNumbers'] = array();
}

?>
