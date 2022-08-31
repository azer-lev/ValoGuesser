<?php

//db: player_gametokens
include_once('../functions/getUserIdByName.php');
include_once('../functions/hash.php');
include_once('../../inc/config.inc.php');

if(isset($_POST['username']) && isset($_POST['sever-authentication'])) {
    $_username = trim($_POST['username']);
    $_userid = getUserIdByName($_username);

    $u_hash = new TokenHash($_userid, $_username);

    print_r($u_hash->getHash());
}

function addHashToDb($hash, $userid) {
    global $dbpdo;

    $stmt = $dbpdo->prepare("INSERT INTO player_gametokens (`playertoken`, `user_id`, `expire_date`) VALUES (:playertoken, :user_id, :expire_date)");
    $result = $stmt->execute(array($hash, $userid, time() + (60 * 60)));
}