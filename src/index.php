```php
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
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .login-box {
            width: 380px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .input-group input {

            width: 100%;
            padding: 12px;

            border: 1px solid #ddd;
            border-radius: 8px;

            font-size: 15px;
            outline: none;
        }


        .input-group input:focus {

            border-color: #667eea;

            box-shadow: 0 0 5px rgba(102,126,234,.5);

        }


        button {

            width:100%;

            padding:12px;

            border:none;

            border-radius:8px;

            background:#667eea;

            color:white;

            font-size:16px;

            cursor:pointer;

            transition:.3s;

        }


        button:hover {

            background:#5563c1;

        }


        .error {

            background:#ffe5e5;

            color:#d8000c;

            padding:10px;

            text-align:center;

            border-radius:8px;

            margin-bottom:20px;

        }


    </style>

</head>


<body>


<div class="login-box">


    <h2>Welcome Back</h2>


    <?php if(isset($error)){ ?>

        <div class="error">
            <?php echo $error; ?>
        </div>

    <?php } ?>


    <form method="POST">


        <div class="input-group">

            <label>Email</label>

            <input 
                type="email" 
                name="email" 
                placeholder="Enter your email"
                required
            >

        </div>


        <div class="input-group">

            <label>Password</label>

            <input 
                type="password" 
                name="password" 
                placeholder="Enter your password"
                required
            >

        </div>


        <button name="login">
            Login
        </button>


    </form>


</div>


</body>
</html>
```