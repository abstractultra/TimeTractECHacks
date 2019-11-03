<?
include "../database_connect.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = null;

    $return_values = $db->query("select password from pacts where group_uuid = '{$_POST['group_id']}'");

    if ($return_values->num_rows >= 1) {
        extract($return_values->fetch_assoc());

        $user_uuid = null;
        $get_user_uuid = $db->query("select user_uuid from active_sessions where session_uuid = '{$_COOKIE['SESSION_UUID']}'");
        if ($get_user_uuid->num_rows >= 1) {
            extract($get_user_uuid->fetch_assoc());

            if (password_verify($_POST['password'], $password)) {
                header("Location: ../TimeTract/index.html");
                die();
                echo "You have successfully joined the group!";
                $db->query("update accounts set group_id = '{$_POST['group_id']}' where uuid = '{$user_uuid}'");
            }
        }
    }
}