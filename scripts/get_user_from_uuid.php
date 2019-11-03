<?php
include "../database_connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $get_username = $db->query("select username, display_name from accounts where uuid = '{$_POST['user_uuid']}'");
    echo json_encode($get_username->fetch_assoc());
}