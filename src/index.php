<?php
include 'config.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            $_SESSION['user'] = $user['name'];

            header("Location: dashboard.php");
        }else{
            echo "Wrong Password";
        }

    }else{
        echo "User Not Found";
    }
}
?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<button name="login">Login</button>

</form>

<a href="register.php">Register</a><br>
<a href="forgot_password.php">Forgot Password?</a>