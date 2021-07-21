

<?php

require '../Database/connection.php';

if (isset($_GET['clear'])) {
    
    $id = $_GET['clear'];

    $sql = "DELETE FROM cart WHERE ID=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);

    $_SESSION['suc'] = "Product item removed! successfull.";
    header("location:../index.php");
}


if (isset($_POST['clear_all'])) {
    
    $sql = "DELETE FROM cart";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $_SESSION['suc'] = "All products item removed! successfull.";
    header("location:../index.php");
}






?>