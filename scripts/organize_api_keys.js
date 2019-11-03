$.post("../scripts/get_user_group_members.php", function (response) {
    response = JSON.parse(response);
    console.log(response);
});