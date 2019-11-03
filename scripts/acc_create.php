<?php
include "../database_connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $return_values = $db->query("select uuid from accounts where username = '{$_POST['username']}'");
    if (mysqli_num_rows($return_values) >= 1) {
        echo "Account already exists!";
    } else {
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $db->query("insert into accounts (username, password, email, display_name, uuid, api_key) values ('{$_POST['username']}','{$password_hash}','{$_POST['email']}','{$_POST['display_name']}',UUID(),'{$_POST['api_key']}')");

        $uuid = null;
        $get_uuid = $db->query("select uuid from accounts where username = '{$_POST['username']}'");
        extract($get_uuid->fetch_assoc());

        $expiry_time = time() + 3000000;
        $session_uuid = uniqid();
        $db->query("insert into active_sessions (session_uuid, user_uuid, expiry) values ('{$session_uuid}', '{$uuid}', '{$expiry_time}')");
        setcookie("SESSION_UUID", $session_uuid, $expiry_time, "/");

        header("Location: ../group_options.html");
        die();
    }
}