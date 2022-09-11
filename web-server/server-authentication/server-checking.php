<?php
/*
 * Execute as script => exec('php your_script.php > /dev/null &');
 */
include_once('../inc/config.inc.php');
global $dbpdo;
$serverCheck = new ServerChecking($dbpdo);
$serverCheck->removeOldServers($dbpdo, time());


class ServerChecking  {
    private $database = NULL;
    private $maxServer = 0;
    public function __construct($dbpdo)
    {
        $this->database = $dbpdo;
    }

    public function pingServers() {
        $this->maxServer = 0;
        $stmt = $this->database->prepare("SELECT * `game_servers` WHERE `server_expire_timestamp` > :server_expire_timestamp");
        $res = $stmt->execute(array("server_expire_timestamp" => time()));
        $url = "";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            try {
                //Ping server for answer
                $url = $row['server_ip'] . ":" . $row['server_port'];
                $options = array(
                    'http' => array(
                        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method' => 'POST',
                        'content' => http_build_query(array())
                    )
                );
                $context = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                if($result !== FALSE) {
                    $this->maxServer += $row['server_queue_size'];
                }else {
                    $stmt = $this->database->preapre("DELETE * FROM `game_servers` WHERE `server_id` = :server_id");
                    $result = $stmt->excute(array("server_id" => $row['server_id']));
                }
            }catch(Exception $ex) {
                print_r($ex->getMessage());
            }
        }
    }

    /**
     * Moves servers older than the given timestamp into a different database
     * @param $removeSince TimeStamp
     * @return void
     */
    public function removeOldServers($db, $removeSince) {
        global $dbpdo;
        print_r("SELECT * FROM `game_servers` WHERE `server_expire_timestamp` < " . $removeSince);
        $stmt = $dbpdo->prepare("SELECT * FROM `game_servers` WHERE `server_expire_timestamp` < :server_expire_timestamp");
        $result = $stmt->excute(array("server_expire_timestamp" => "" . $removeSince . ""));

        $moveObjects = array();

        for($i = 0; $i < count($result); $i++)
            array_push($moveObjects, $result[$i]);

        if(count($moveObjects) < 1)
            return;

        //Number of Objects big enough, move objects to storage
        $sql = generateSql($moveObjects);
        $server_id_array = getServerIdArray($moveObjects);

        //delete data from first db
        $stmt2 = $db->prepare($sql);
        $result2 = $stmt2->excute(array($server_id_array));

        //insert data in second db
        for($k = 0; $k < count($moveObjects); $k++) {
            $stmt3 = $db->prepare("INSERT INTO `game_servers_old` ( `server_name`, `server_ip`, `server_port`, `server_queue_size`, `server_token`, `server_expire_timestamp`, `server_remove_timestamp`) VALUES (:server_name, :server_ip, :server_port, :server_queue_size, :server_token, :server_expire_timestamp, :server_remove_timestamp)");
            $result3 = $stmt3->execute(array(
                "server_name" => $moveObjects[$k]['server_name'],
                "server_ip"  => $moveObjects[$k]['server_ip'],
                "server_port" => $moveObjects[$k]['server_port'],
                "server_queue_size" => $moveObjects[$k]['server_queue_size'],
                "server_token" => $moveObjects[$k]['server_token'],
                "server_expire_timestamp" => $moveObjects[$k]['server_expire_timestamp'],
                "server_remove_timestamp" => $moveObjects[$k]['server_remove_timestamp']
            ));
        }


    }

    public function getNumberOfMaxServers() {
        return $this->maxServer;
    }
}


function generateSql($arr) {
    $sql = "DELETE * `game_servers`";
    for($i = 0; $i < count($arr); $i++){
        ($i != 1) ? $sql = $sql . " WHERE server_id = :server_id" . $i : $sql = $sql . " AND WHERE server_id = :server_id" . $i;
    }
    return $sql;
}

function getServerIdArray($db_result) {
    $arr = array();
    for($i = 0; $i < count($db_result); $i++) {
        array_push($arr, $db_result[$i]['server_id']);
    }
    return $arr;
}

$test_arr = array(["server_id" => 1], ["server_id" => 2], ["server_id" => 3]);
print_r(generateSql($test_arr));
?>