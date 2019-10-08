<h2>User settings</h2>
<form action="/user.php?id=<?php echo $_GET['id']; ?>" method="post">
    First Name: <input type="text" name="fname" value="<?php
        echo $user_details['first_name'];
    ?>"><br>
    Last Name: <input type="text" name="lname" value="<?php
        echo $user_details['last_name'];
    ?>"><br>
    Email: <input type="text" name="email" value="<?php
        echo $user_details['email'];
    ?>"><br>
    Password: <input type="password" name="password"> (Needed to make changes)
    <br>
    <input type="submit" value="Change details">
</form>
<br>
<h3>Advanced</h3>
<div>
    <a href="/user.php?id=<?php
        echo $_GET['id'];
    ?>&amp;action=delete">Delete Account</a>
</div>
<div>
    <a href="/user.php?id=<?php
        echo $_GET['id'];
    ?>&amp;action=change_password">Change Password</a>
</div>