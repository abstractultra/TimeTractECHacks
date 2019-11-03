<?php
include "../database_connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = null; $uuid = null;
    $return_values = $db->query("select uuid, password from accounts where username = '{$_POST['username']}'");
    if ($return_values->num_rows >= 1) {
        extract($return_values->fetch_assoc());
        if (password_verify($_POST['password'], $password)) {
            echo "Sign in successful";
            $expiry_time = time() + 3000000;
            $session_uuid = uniqid();
            $db->query("insert into active_sessions (session_uuid, user_uuid, expiry) values ('{$session_uuid}', '{$uuid}', '{$expiry_time}')");
            setcookie("SESSION_UUID", $session_uuid, $expiry_time, "/");
        }
    }
}