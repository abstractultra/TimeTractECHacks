<?php
include "../database_connect.php";
$api_key = null;
$get_user_api = $db->query("select api_key from accounts where session_uuid = '{$_COOKIE['SESSION_UUID']}'");
if ($get_user_api->num_rows >= 1) {
    extract($get_user_api->fetch_assoc());
    echo $api_key;
}