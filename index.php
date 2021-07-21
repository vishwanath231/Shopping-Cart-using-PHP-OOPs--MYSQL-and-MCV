<?php
session_start();

include 'Database/Database.php';
$conn = new Database();
$db = $conn->connect();

// CART ITEM COUNTS
$sql = "SELECT * FROM cart";
$stmt = $db->prepare($sql);
$stmt->execute();
$cart__count = $stmt->rowCount();

// PRODUCT ITEM
$sql_1 = "SELECT * FROM product";
$stmt_1 = $db->query($sql_1);
$product = $stmt_1->fetchAll();

// CART ITEM
$sql_2 = "SELECT * FROM cart";
$stmt_2 = $db->query($sql_2);
$cartItem = $stmt_2->fetchAll();
$grandTotal = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Shopping Cart</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/index.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/font/css/all.css">
</head>

<body>


    

    <div class="shopping__cart">
        <div class="logo">
            <img src="assets/img/logo.svg" alt="">
        </div>
        <div class="flex__cart">
            <a href="view/newProduct.view.php">
                <div class="add__product">
                    <img src="assets/img/product.gif" alt="">
                    <div class="tag">New Product</div>
                </div>
            </a>
            <div class="cart" onclick="toggle();">
                <img src="assets/img/cart.gif" alt="">
                <div class="cart__num"><?php echo $cart__count ?></div>
            </div>
        </div>
    </div>



    <div class="titles">
        <div id="message">
            <!-- ERRROR MSG -->
            <?php if (isset($_SESSION['err'])) { ?>
                <div class="error message"><?php echo $_SESSION['err']; ?></div>
            <?php unset($_SESSION['err']);
            } ?>
            <!-- SUCCESS MSG -->
            <?php if (isset($_SESSION['suc'])) { ?>
                <div class="success message"><?php echo $_SESSION['suc']; ?></div>
            <?php unset($_SESSION['suc']);
            } ?>
        </div>


        <div class="title">Our Products</div>
        <img src="assets/img/line-1.gif" alt="" width="150px">

    </div>




    <div class="product__container">
        <div class="grid">
            <?php foreach ($product as $productItem) { ?>
                <div class="product__box">
                    <img src="assets/store/<?php echo $productItem['P_Img'] ?>" alt="" class="product__img">
                    <div class="product__name"><?php echo $productItem['P_Name']; ?></div>
                    <div class="product__price">₹<?php echo $productItem['P_Price']; ?></div>

                    <form action="Model/addCart.model.php" method="POST" class="add__cart-form">
                        <input type="hidden" name="p_id" value="<?php echo $productItem['ID'] ?>">
                        <input type="hidden" name="p_code" value="<?php echo $productItem['P_Code'] ?>">
                        <input type="hidden" name="p_img" value="<?php echo $productItem['P_Img'] ?>">
                        <input type="hidden" name="p_name" value="<?php echo $productItem['P_Name'] ?>">
                        <input type="hidden" name="p_qty" value="<?php echo $productItem['P_Qty'] ?>">
                        <input type="hidden" name="p_price" value="<?php echo $productItem['P_Price'] ?>">
                        <button type="submit" name="submit" class="add__cart-btn"> <img src="assets/img/cart.png" alt=""> Add cart</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>


    <div class="cart__box-container">
        <div class="cart__box">
            <div class="close__box">
                <img src="assets/img/close.png" onclick="toggle();" alt="">
            </div>
            <div class="cart__title">Your <span>Cart</span></div>


            <?php
            if ($cart__count != 0) {
                foreach ($cartItem as $item) {
            ?>
                    <div class="cart__item-container">
                        <div class="flex__cart-item">
                            <div class="product__item">
                                <div class="product__image">
                                    <img src="assets/store/<?php echo $item['P_Img'] ?>" alt="">
                                </div>
                                <div class="product___list-item">
                                    <div class="item__name"><?php echo $item['P_Name'] ?></div>
                                    <div class="item__price">₹<?= number_format($item['Total_Price'], 2) ?></div>
                                    <a href="controller/cartClear.php?clear=<?php echo $item['ID'] ?>"><img src="assets/img/trash-2.gif" alt=""></a>
                                </div>
                            </div>
                            <div class="product__qty">
                                <input type="hidden" class="p__id" value="<?php echo $item['ID'] ?>">
                                <input type="hidden" class="p__price" value="<?php echo $item['P_Price'] ?>">
                                <input type="number" class="p__qty" value="<?php echo $item['P_Qty'] ?>">
                            </div>
                        </div>
                    </div>
                    <?php $grandTotal += $item['Total_Price'] ?>
                <?php

                }
                ?>
                <div class="total__price">
                    <span>Your Total : </span>
                    <span>₹<?= number_format($grandTotal, 2) ?></span>
                </div>

                <div class="cart__buttons">
                    <form action="Controller/cartClear.php" method="POST">
                        <button type="submit" class="all__clear-item" name="clear_all">clear cart</button>
                    </form>
                    <button class="checkout">checkout</button>
                </div>
            <?php

            } else {
                echo "<div class='recordMsg'>No records in cart! Shopping now.</div>";
            }
            ?>
        </div>
    </div>





    <script src="Assets/lib/jquery.js"></script>
    <script src="Assets/js/script.js"></script>

    <script>
        $(document).ready(function() {

            $(".p__qty").on("change", function() {

                var $totalPrice = $(this).closest(".flex__cart-item");

                var pId = $totalPrice.find(".p__id").val();
                var pPrice = $totalPrice.find(".p__price").val();
                var pQty = $totalPrice.find(".p__qty").val();

                $.ajax({

                    url: "Controller/productQty.php",
                    method: "post",
                    cache: false,
                    data: {
                        pId: pId,
                        pPrice: pPrice,
                        pQty: pQty
                    },
                    success: function(res) {
                        location.reload(true);
                        console.log(res);
                    }
                })

            })
        })


        
    </script>




</body>

</html>