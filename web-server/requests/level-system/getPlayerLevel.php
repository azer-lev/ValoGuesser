<?php

include('../../inc/config.inc.php')

if(isset($_POST['username']) && isset($_POST['sever-authentication'])) {
    //TODO add server authentication
    global $dbpdo;
    $_username = trim($_POST['username']);


    $stmt = $dbpdo->prepare("SELECT current_level FROM `level-system` WHERE user_id = (SELECT user_id FROM userstorage WHERE user_username = :user_username)");
    $result = $stmt->execute(array("user_username" => $_username));
    $user_level = $stmt->fetch();
    print_r($user_level)
}