<?php

include_once('../../inc/config.inc.php');

function getUserIdByName($username) {
    global $dbpdo;
    $stmt = $dbpdo->prepare("SELECT user_id FROM userstorage WHERE user_username = :user_username");
    $res = $stmt->execute(array("user_username" => $username));
    return $stmt->fetch()[0];
}