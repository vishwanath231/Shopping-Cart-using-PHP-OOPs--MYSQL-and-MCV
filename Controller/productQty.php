<?php

include '../Database/connection.php';

if (isset($_POST['pQty'])) {
    
    $pId = $_POST['pId'];
    $pQty = $_POST['pQty'];
    $pPrice = $_POST['pPrice'];

    echo $pId;

    $total__Price = $pQty * $pPrice;

    $sql = "UPDATE cart SET P_Qty=:P_Qty, Total_Price=:Total_Price WHERE ID=:ID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":P_Qty",$pQty);
    $stmt->bindParam(":Total_Price", $total__Price);
    $stmt->bindParam(":ID",$pId);
    $stmt->execute();
}



?>