<div>
<h2>Delete Account</h2>
<form action="/user.php?id=<?php
echo $_GET['id'];
?>&amp;delete=true" method="post">
    Are you sure you want to delete the account associated with <a href="<?php
    echo "/user.php?id=" . $_GET['id'];
    ?>"><?php
    echo $user_details['email'];
    ?></a>?
    <br>
    <input type="submit" value="Yes">
</form>
</div>