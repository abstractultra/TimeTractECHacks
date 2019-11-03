<?php
include "../database_connect.php";
$group_id = null; $user_uuid = null; $api_key = null;
$get_user_uuid = $db->query("select user_uuid from active_sessions where session_uuid = '{$_COOKIE['SESSION_UUID']}'");

extract($get_user_uuid->fetch_assoc());

$get_group_id = $db->query("select group_id, api_key from accounts where uuid = '{$user_uuid}'");

if ($get_group_id->num_rows >= 1) {

    extract($get_group_id->fetch_assoc());

    $users = array();

    $result = $db->query("select uuid from accounts where group_id = '$group_id'");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[$row['uuid']] = $api_key;
        }
    }

    $users = json_encode($users);

    echo $users;
}