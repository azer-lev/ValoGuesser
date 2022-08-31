<?php

class ServerHash {
    public function __construct($_serverName, $_serverIp) {
        $this->serverName = $_serverName;
        $this->serverIp = $_serverIp;
    }

    public function getHash() {
        $hash = ($this->nameToInt($this->serverName)) << 2;
        $uhash = $this->nameToInt($this->serverIp) * 7 >> 1;
        $d1 = new Datetime();
        return $hash . "" . $uhash . "" . $d1->format('U');
    }

    private function nameToInt($var) {
        $a = 1;
        foreach (str_split($var) as $char) {
            $a += ord($char);
        }
        return $a << 1;
    }
}