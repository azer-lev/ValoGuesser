<?php

include_once('../inc/config.inc.php');
include_once('../requests/functions/serverHash.php');

if(isset($_POST['server-name']) && isset($_POST['queue-size'])) {
    global $dbpdo;
    //Todo generate Server token used for auth
    $_serverName = trim($_POST['server-name']);
    $_serverQueueSize = (int) trim($_POST['queue-size']);
    $request_addr = $_SERVER['REMOTE_ADDR'];
    $_expireTimestamp = time() + (30 * 60);

    $serverHash = new ServerHash($_serverName, $request_addr);
    $serverToken = $serverHash->getHash();

    $stmt = $dbpdo->prepare("INSERT INTO `game_servers` (server_name, server_ip, server_queue_size, server_token, server_expire_timestamp) VALUES (:server_name, :server_ip, :server_queue_size, :server_token, :server_expire_timestamp)");
    $result = $stmt->execute(array("server_name" => $_serverName, "server_ip" => $request_addr, "server_queue_size" => $_serverQueueSize, "server_token" => $serverToken,"server_expire_timestamp" => $_expireTimestamp));
    print_r($serverToken);
}