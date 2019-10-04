<?php
session_start();
session_unset();
session_destroy();

include('../utilities/redirect.php');
redirect('/login.php');
?>