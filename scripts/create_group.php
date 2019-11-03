<?php
$group_name = $_POST["name"];
$group_pass = password_hash($_POST["password"], PASSWORD_BCRYPT);
$group_id = uniqid();

if (!isset($_COOKIE['SESSION_UUID'])) {
    echo 'Not logged in.';
    return;
}

echo $_COOKIE['SESSION_UUID'];

$get_user_uuid = $db->query("select user_uuid from active_sessions where session_uuid = '{$_COOKIE['SESSION_UUID']}'");

if ($get_user_uuid->num_rows >= 1) {
    $user_uuid = $get_user_uuid->fetch_assoc()['user_uuid'];
} else {
    echo 'An error occurred.';
}
$db->query("insert into pacts (group_uuid, leader_uuid, group_name, password) values ('$group_id', '$user_uuid', '$group_name', '$group_pass')");
