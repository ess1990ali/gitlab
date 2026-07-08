<?php
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location:index.php");
}

echo "<h2>Welcome ".$_SESSION['user']."</h2>";
?>

<a href="logout.php">Logout</a>