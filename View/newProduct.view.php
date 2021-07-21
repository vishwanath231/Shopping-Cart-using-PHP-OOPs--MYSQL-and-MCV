<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link rel="icon" href="../Assets/img/icon.png">
    <link rel="stylesheet" href="../Assets/css/product.css?<?php echo time(); ?>">
</head>

<body>

    <div class="container">
        <form action="../Model/product.model.php" method="POST" enctype="multipart/form-data" class="form">
            <a href="../index.php" class="return__home"><img src="../Assets/img/Home.gif" alt=""></a>
            <div class="title">Product Form</div>
            <!-- SUCCESS MESSAGE -->
            <?php if (isset($_SESSION['msg'])) { ?>
                <div class="success"><?php echo $_SESSION['msg']; ?></div>
            <?php
                unset($_SESSION['msg']);
            } ?>
            <div class="product__imgs">
                <img src="../Assets/img/placeholder.jpg" id="placeholder" onclick="tigger();" alt="">
                <label for="">Upload Images</label>
                <input type="file" name="product__img" id="product__img" onchange="productImg(this);" style="display: none;">
            </div>
            <div class="form__div">
                <label>Product Name <span>*</span></label>
                <input type="text" name="product__name" class="form__control" placeholder="Example: queen panel bed" required>
            </div>
            <div class="form__div">
                <label>Product Price <span>*</span></label>
                <input type="text" name="product__price" class="form__control" placeholder="Example: ₹2000" required>
            </div>
            <button type="submit" name="submit" class="form__button">submit</button>
        </form>
    </div>



    <script src="../Assets/js/script.js"></script>

</body>

</html>