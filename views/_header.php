<div id="navbar">
    <a href="/">Home</a> -
    <?php
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user'];
        echo "<a href=\"/user.php?id=$user_id\">My profile</a> -\n" .
            "\t<a href=\"/post.php\">Post</a> |\n";
        include('_welcome_user.php');
    } else {
        echo "<a href=\"/login.php\">Login</a> - \n" .
            "\t<a href=\"/register.php\">Register</a>";
    }
    echo "\n";
    ?>
</div>
<br>