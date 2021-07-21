<?php

class Cart {

    private $db;

    function __construct($db_conn){
        $this->db = $db_conn;
    }

    public function cartPost($P_CODE, $P_IMG, $P_NAME, $P_PRICE ,$P_QTY){

        try {

            $sql = "INSERT INTO cart (P_Code,P_Img,P_Name,P_Price,P_Qty,Total_Price) VALUES (:P_Code, :P_Img, :P_Name, :P_Price, :P_Qty, :Total_Price)";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":P_Code", $P_CODE);
            $stmt->bindParam(":P_Img", $P_IMG);
            $stmt->bindParam(":P_Name", $P_NAME);
            $stmt->bindParam(":P_Price", $P_PRICE);
            $stmt->bindParam(":P_Qty", $P_QTY);
            $stmt->bindParam(":Total_Price", $P_PRICE);

            $stmt->execute();

            header("location:../index.php");
            
        } catch (TypeError $e) {
            echo $e->getMessage();
            echo "CART ERROR";
        }
    }

}



?>