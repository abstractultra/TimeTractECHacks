<?php
include "../database_connect.php";
if (isset($_FILES['upload_file'])) {
    $get_user_uuid = $db->query("select user_uuid from active_sessions where session_uuid = '{$_COOKIE['SESSION_UUID']}'");
    if ($get_user_uuid->num_rows >= 1) {
        $user_uuid = null;
        extract($get_user_uuid->fetch_assoc());
        $arr = explode('.',$_FILES['upload_file']['name']);
        $file_extension = strtolower(end($arr));
        $errors = array();
        $allowed_extensions = array("jpeg", "jpg");
        if ($_FILES['upload_file']['size'] > 5242880)
            $errors[] = "File size must be less than 5MB!";
        if (in_array($file_extension, $allowed_extensions) === false)
            $errors[] = "File must be a JPEG!";
        if (empty($errors) == true) {
            move_uploaded_file($_FILES['upload_file']['tmp_name'], "{$_SERVER['DOCUMENT_ROOT']}/accounts/profile_photos/$user_uuid.jpg");
        } else {
            print_r($errors);
        }
    }
}