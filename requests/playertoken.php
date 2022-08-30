<?php

include_once('../inc/config.inc.php');

if(isset($_POST['playertoken']) && isset($_POST['login_password'])) {
    global $dbpdo;
    $token = trim($_POST['playertoken']);
    $stmt = $dbpdo->prepare("SELECT * FROM player_gametokens WHERE playertoken = :playertoken");
    $result = $stmt->execute(array("playertoken" => $token));
    $answer = $stmt->fetch();
    print_r($answer);
}

?>