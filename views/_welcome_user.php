<span>Welcome
<?php
include('../models/import.php');
$user = new User();
$user_details = $user->read($_SESSION['user']);
echo $user_details['first_name'] . " " . $user_details['last_name'];
?>
</span>