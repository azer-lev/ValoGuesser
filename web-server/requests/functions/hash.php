<?php

function u_hash($userid, $username) {
    $hash = ($userid * 1024) << 4;
    $uhash = nameToInt($username);
    $d1 = new Datetime();
    return $hash . "" . $uhash . "" . $d1->format('U');
}

function nameToInt($username) {
    $a = 1;
    foreach (str_split($username) as $char) {
        $a += ord($char);
    }
    return $a << 1;
}
