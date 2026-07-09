<?php
include 'config.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $authenticated = false;

    foreach($users as $user){

        if($user['email'] == $email && $user['password'] == $password){

            $_SESSION['user'] = $user['name'];
            $authenticated = true;

            header("Location: dashboard.php");
            exit;
        }
    }

    if(!$authenticated){
        echo "Invalid email or password";
    }
}
?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>
<br><br>

<input type="password" name="password" placeholder="Password" required>
<br><br>

<button name="login">Login</button>

</form>