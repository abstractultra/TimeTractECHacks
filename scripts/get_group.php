<?php
  $users = array();
  if (isset($_POST['uuid'])) {
    $id = $_POST['uuid'];
    $result = $db->query("select uuid from accounts where group_id = '$id'");
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($users, $row['uuid']);
      }
    }
  }
  echo json_encode($users);
?>