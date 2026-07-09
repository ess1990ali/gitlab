
<?php
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit;
}


// Example blocks/products
$products = [

    [
        "name" => "Premium Package",
        "description" => "Complete package with advanced features and support.",
        "price" => "99 USD"
    ],

    [
        "name" => "Basic Package",
        "description" => "Simple package suitable for beginners.",
        "price" => "49 USD"
    ],

    [
        "name" => "Enterprise Package",
        "description" => "Full solution for companies and large teams.",
        "price" => "199 USD"
    ],

    [
        "name" => "Support Plan",
        "description" => "24/7 technical support service.",
        "price" => "29 USD"
    ]

];

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>


<style>

* {
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}


body {

    margin:0;

    background:#f4f6f9;

}


.header {

    background:#667eea;

    color:white;

    padding:20px 40px;

    display:flex;

    justify-content:space-between;

    align-items:center;

}


.header a {

    color:white;

    text-decoration:none;

    background:#5563c1;

    padding:10px 20px;

    border-radius:8px;

}



.container {

    padding:40px;

}


.cards {

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));

    gap:25px;

}



.card {

    background:white;

    padding:25px;

    border-radius:15px;

    box-shadow:0 5px 15px rgba(0,0,0,.1);

    transition:.3s;

}



.card:hover {

    transform:translateY(-5px);

}



.card h3 {

    color:#333;

    margin-top:0;

}



.description {

    color:#666;

    min-height:60px;

}



.price {

    font-size:22px;

    color:#667eea;

    font-weight:bold;

    margin-top:20px;

}



.button {

    margin-top:20px;

    display:inline-block;

    background:#667eea;

    color:white;

    padding:10px 20px;

    border-radius:8px;

    text-decoration:none;

}


</style>


</head>


<body>


<div class="header">

    <h2>
        Welcome <?php echo $_SESSION['user']; ?>
    </h2>


    <a href="logout.php">
        Logout
    </a>

</div>



<div class="container">


<h2>Available Packages</h2>


<div class="cards">


<?php foreach($products as $product){ ?>


<div class="card">


    <h3>
        <?php echo $product['name']; ?>
    </h3>


    <p class="description">
        <?php echo $product['description']; ?>
    </p>


    <div class="price">
        <?php echo $product['price']; ?>
    </div>


    <a href="#" class="button">
        Select
    </a>


</div>


<?php } ?>


</div>


</div>


</body>

</html>
