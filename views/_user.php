<?php
if ($authorized) {
    $user_id = $user_details['ID'];
    echo "<div id=\"user-control\">\n\t<span>" .
    "<a href=\"/user.php?id=$user_id&amp;action=edit\">Settings</a></span>\n" .
    "</div>\n";
}
?>
<div id="profile">
<table>
<tr>
    <td>First Name :</td>
    <td><?php echo $user_details['first_name']; ?></td>
</tr>
<tr>
    <td>Last Name :</td>
    <td><?php echo $user_details['last_name']; ?></td>
</tr>
<tr>
    <td>Email :</td>
    <td><?php echo $user_details['email']; ?><br></td>
</tr>
<tr>
    <td>Account created on :</td>
    <td><?php echo $user_details['reg_date']; ?></td>
</tr>
</table>
</div>