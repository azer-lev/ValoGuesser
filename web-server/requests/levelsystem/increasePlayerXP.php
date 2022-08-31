<?php

include_once('../../inc/config.inc.php');

if(isset($_POST['username']) && isset($_POST['sever-authentication']) && isset($_POST['player-xp'])) {
    global $dbpdo;

    $username = trim($_POST['username']);
    $increaseXPValue = (int) trim($_POST['player-xp']);

    $stmt = $dbpdo->prepare("SELECT current_level, xp FROM `level-system` WHERE `user_id` = (SELECT user_id FROM userstorage WHERE user_username = :user_username)");
    $result = $stmt->execute(array("user_username" => $username));
    $level_result = $stmt->fetch();

    $currentPlayerXP = (int) $level_result['xp'];
    $currentPlayerLevel = (int) $level_result['current_level'];

    if($currentPlayerXP + $increaseXPValue > 99) {
        $currentPlayerLevel++;
        $currentPlayerXP = $currentPlayerXP + $increaseXPValue - 100;
    }else {
        $currentPlayerXP += $increaseXPValue;
    }

    $stmt = $dbpdo->prepare("UPDATE `level-system` SET current_level = :current_level, xp = :xp");
    $result = $stmt->execute(array("current_level" => $currentPlayerLevel, "xp" => $currentPlayerXP));
    print_r("Level & XP updated");
}