
<?php

session_start();


// include '../Database/Database.php';

class Product {
    
    private $db;

    function __construct($db_conn){
        $this->db = $db_conn;
    }

    public function Register($P_CODE, $P_IMG, $P_NAME,$P_QTY, $P_PRICE){

        try {

            $sql = "INSERT INTO product (P_Code,P_Img,P_Name,P_Qty,P_Price) VALUES (:P_Code, :P_Img, :P_Name, :P_Qty, :P_Price)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":P_Code", $P_CODE);
            $stmt->bindParam(":P_Img", $P_IMG);
            $stmt->bindParam(":P_Name", $P_NAME);
            $stmt->bindParam(":P_Qty", $P_QTY);
            $stmt->bindParam(":P_Price", $P_PRICE);

            $stmt->execute();

            $_SESSION['msg'] = "Record inserted successfull";
            header("location:../View/newProduct.view.php");

        } catch (TypeError $e) {
            echo $e->getMessage();
            echo "INSERTMETHOD ERROR";
        }
    }
    
}

// $conn = new Database();
// $db = $conn->connect();

// $product = new Product($db);


?>