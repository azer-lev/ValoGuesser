<?php
include_once('../inc/config.inc.php');

if(isset($_POST['playertoken']) && isset($_POST['login_password'])) {
    global $dbpdo;
    $_playertoken = trim($_POST['playertoken']);

    $stmt = $dbpdo->prepare("SELECT user_id,user_username,user_email FROM `userstorage` WHERE user_id = (SELECT user_id FROM `player_gametokens` WHERE playertoken = :playertoken)");
    $result = $stmt->execute(array("playertoken" => $_playertoken));
    $answer = $stmt->fetch();
    print_r($answer);
}else {
    print_r("What");
}

?>