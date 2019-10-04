<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
<a href="/">Home</a> - 
<a href="/login.php">Login</a> - 
<a href="/register.php">Register</a> - 
<?php
if (isset($_SESSION['user'])) {
    include('_welcome_user.php');
}
?>
<br>

<?php include($childView); ?>

</body>
</html>