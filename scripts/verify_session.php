<?php
include "../database_connect.php";
if (isset($_COOKIE['SESSION_UUID'])) {
    $verify_session = $db->query("select session_uuid from active_sessions where session_uuid = '{$_COOKIE['SESSION_UUID']}'");
    if ($verify_session->num_rows >= 1) {
        echo 1;
    } else {
        echo 0;
    }
}