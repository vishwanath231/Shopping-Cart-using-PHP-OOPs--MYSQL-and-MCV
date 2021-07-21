<?php

include '../Database/connection.php';

if (isset($_POST['submit'])) {


    $p_code = $_POST['p_code'];
    $p_img = $_POST['p_img'];
    $p_name = $_POST['p_name'];
    $p_qty = $_POST['p_qty'];
    $p_price = $_POST['p_price'];

    try {

        $sql = "SELECT * FROM cart WHERE (P_Code = :P_Code)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":P_Code", $p_code);
        $stmt->execute();
        $checkCode = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($checkCode > 0) {
            $_SESSION['err'] = "Product already added in cart! Please check it.";
            header("location:../index.php");
        } else {
            $cart->cartPost($p_code, $p_img, $p_name, $p_price, $p_qty);
            $_SESSION['suc'] = "Product added in cart";
            header("location:../index.php");
        }
        
    } catch (TypeError $e) {
        echo $e->getMessage();
        echo "PRODUCT MODEL ERROR";
    }

}





?>