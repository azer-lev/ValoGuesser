<?php

include_once('../../inc/config.inc.php');

function getUserIdByName($username) {
    global $dbpdo;
    $_username = trim($_POST['username']);
    $stmt = $dbpdo->prepare("SELECT user_id FROM userstorage WHERE user_username = :user_username");
    $res = $stmt->execute(array("user_username" => $_username));
    return $stmt->fetch()[0];
}