<?php
$id = $_POST['id'];
$key = $db->query("select api_key from accounts where uuid = \"$id\"");
$url = "https://www.rescuetime.com/anapi/data?key=$key";
$result = file_get_contents($url, false);
if ($result === FALSE) {
  die("Error occurred at getinfo.php"); 
}
echo $result;

?>