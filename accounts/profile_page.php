<?php
parse_str($_SERVER["QUERY_STRING"], $query_string);
extract($query_string);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../js/jquery.min.js"></script>
    <script>
        $.post("get_user_from_uuid.php", { user_uuid : "<?php echo $user_uuid?>" }, function(data) {
            data = JSON.parse(data);
            document.getElementById("user_info").innerHTML= "<p style='font-size: 100%'>" + data.display_name + "</p><p style='font-size: 50%'>[" + data.username + "]</p>";
        });
    </script>
    <style>
        #user_desc {
            width: 50%;
            margin-left: auto;
            margin-right:auto;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="user_desc">
    <img src="profile_photos/<?php echo $user_uuid?>.jpg" alt="Profile Photo" width="35%" height="35%"/>
    <div id="user_info"></div>
</div>
</body>
</html>
