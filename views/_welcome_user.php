<span>Welcome
<?php
$user = new User();
$session_user = $user->read($_SESSION['user']);
echo $session_user['first_name'] . " " . $session_user['last_name'];
?>
</span>