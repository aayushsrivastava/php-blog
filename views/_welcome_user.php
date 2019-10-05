<?php
$user = new User();
$session_user = $user->read($_SESSION['user']);
$name = $session_user['first_name'] . ' ' . $session_user['last_name'];

echo "\t<span>Welcome $name!</span>\n\t" .
    "<span><a href=\"/logout.php\">(Sign out)</a></span>"
?>