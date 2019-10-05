<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
<?php include('_header.php'); ?>

<?php include($childView); ?>

</body>
</html>