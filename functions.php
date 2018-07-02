<?php

/**
 * @param String $file
 * @return array
 */
function decodeJson($file)
{
    $string = file_get_contents($file);
    $json = json_decode($string, true);
    $array = array();
    foreach ($json["messages"] as $message) {
        $user = utf8_decode($message["sender_name"]);
        $array[$user] = isset($array[$user]) ? ($array[$user] + 1) : 1;
    }
    arsort($array);
    return $array;
}