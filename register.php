<?php
include 'config.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($check->num_rows > 0){
        echo "Email already exists!";
    }else{
        $conn->query("INSERT INTO users(name,email,password)
        VALUES('$name','$email','$password')");
        echo "Registration Successful";
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>

    <button name="register">Register</button>
</form>

<a href="index.php">Login</a>