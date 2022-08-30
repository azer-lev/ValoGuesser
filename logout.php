<?php
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("token_identifier","",time()-(3600*24*365)); 
setcookie("token_security","",time()-(3600*24*365)); 
setcookie("loggedIn","",time()-(3600*24*365)); 

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
echo("<script>localStorage.setItem('loggedIn', 'false');</script>");

header("Location: " . $urlHomepage);