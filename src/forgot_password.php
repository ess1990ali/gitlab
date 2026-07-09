<?php
include 'config.php';

if(isset($_POST['submit'])){

    $email = $_POST['email'];

    $token = md5(rand());

    $conn->query("UPDATE users SET reset_token='$token'
    WHERE email='$email'");

    echo "Reset Link:<br>";

    echo "<a href='reset_password.php?token=$token'>
    Reset Password
    </a>";
}
?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<button name="submit">Send Reset Link</button>
<button name="submit">Sendd Reset Link</button>

</form>