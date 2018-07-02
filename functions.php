<?php

/**
 * @param String $file
 * @return array
 */
function decodeJson($file)
{
    $json = json_decode(file_get_contents($file), true);
    $array = array();
    foreach ($json["messages"] as $message) {
        $user = utf8_decode($message["sender_name"]);
        $array[$user] = isset($array[$user]) ? ($array[$user] + 1) : 1;
    }
    arsort($array);
    return $array;
}

/**
 * @param $result
 */
function display($result)
{
    ?>
    <table>
        <tr>
            <th>User</th>
            <th>Messages</th>
        </tr>
        <?
        foreach ($result as $user => $n) {
            echo "<tr><td class=\"user\">$user</td> <td class=\"messages\">$n</td></tr>";
        }
        ?>
    </table>
    <?
//    foreach ($result as $user => $n) {
//        echo "<div class=\"wrap\"><span class=\"user\">$user</span> <span class=\"messages\">$n</span></div>";
//    }
}