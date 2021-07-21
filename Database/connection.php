<?php

include 'Database.php';
include '../Controller/controller.php';
include '../Controller/Cart.php';



$conn = new Database();
$db = $conn->connect();

// Product post
$product = new Product($db);

// Product item Added to Cart
$cart = new Cart($db);



?>