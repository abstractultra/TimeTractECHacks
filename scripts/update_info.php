<?php
  /*
  Gets the user's JSON information as stored in database. If no infermation for the user is found, then initialize with a fresh query from the RescueTime API
  */
  $id = $_POST["id"];
  $result = $db->query("select json from data where id = $id");
  if ($result->num_rows > 0) {
    echo $db->fetch_assoc()['json'];
  } else {
    require "getinfo.php";
  }
?>