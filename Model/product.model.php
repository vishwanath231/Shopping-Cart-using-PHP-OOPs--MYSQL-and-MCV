

<?php

include '../Database/connection.php';

$p_code = rand(000,999);
$p_img = $_FILES['product__img']['name'];
$p_name = $_POST['product__name'];
$p_qty = "1";
$p_price = $_POST['product__price'];

    
    try {
        $target = '../Assets/store/' . $p_img;
        move_uploaded_file($_FILES['product__img']['tmp_name'], $target);

        $product->Register($p_code, $p_img, $p_name, $p_qty, $p_price);
    } catch (TypeError $e) {
        echo $e->getMessage();
        echo "PRODUCT MODEL ERROR";
    }

?>