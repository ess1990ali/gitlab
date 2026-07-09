<?php
include 'config.php';

$token = $_GET['token'];

if(isset($_POST['reset'])){

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("UPDATE users
    SET password='$password',
    reset_token=NULL
    WHERE reset_token='$token'");

    echo "Password Changed Successfully";
}
?>

<form method="POST">

<input type="password" name="password"
placeholder="New Password" required>

<button name="reset">Reset Password</button>

</form>