<?php

class TokenHash {
    public function __construct($_userid, $_username) {
        $this->userid = $_userid;
        $this->username = $_username;
    }

    public function getHash() {
        $hash = ($this->userid * 1024) << 4;
        $uhash = $this->nameToInt($this->username);
        $d1 = new Datetime();
        return $hash . "" . $uhash . "" . $d1->format('U');
    }

    private function nameToInt() {
        $a = 1;
        foreach (str_split($this->username) as $char) {
            $a += ord($char);
        }
        return $a << 1;
    }
}