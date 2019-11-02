<h2>Change your password</h2>
<form action="/user.php?id=<?php echo $_GET['id']; ?>&amp;change_password=true" method="post">
    Old Password: <input type="password" name="old_password"><br>
    New Password: <input type="password" name="new_password"><br>
    <input type="submit" value="Change password">
</form>