<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'valoguesser_test1';
$dbpdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);

//$dbpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$urlLoginPage = "http://localhost/ValoGuesser/web-server/login.php";
$urlHomepage = "http://localhost/ValoGuesser/web-server/index.php";