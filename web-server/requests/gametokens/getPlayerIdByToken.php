<?php

include_once('../../inc/config.inc.php');

if(isset($_POST['token']) && isset($_POST['sever-authentication'])) {
    global $dbpdo;

    $_token = trim($_POST['token']);
    $stmt = $dbpdo->prepare("SELECT user_id FROM `player_gametokens` WHERE playertoken = :playertoken");
    $result = $stmt->execute(array("playertoken" => $_token));
    print_r($stmt->fetch());
}