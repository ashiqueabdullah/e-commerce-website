<?php
    include 'session.php';
    Session::checkSession();
?>



<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="myadmi">
        <div class="top_bar">
            <div class="title">
                <div class="row">
                    <div class="col-md-8">
                        <marquee>
                            <h1>Admin Panel</h1>
                        </marquee>
                    </div>
                    <div class="col-md-4">
                        <?php
                            if (isset($_GET['action']) and $_GET['action']=="logout") {
                                Session::destroy();
                            }
                        ?>
                        <ul>
                            <li><img class="myimg" src="img/products/p12.jpg" alt="" height="30" width="30"></li>
                            <li><?php echo Session::get('adminName'); ?></li>
                            <li><a href="?action=logout">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="left_box">
            <img class="myimg" src="img/logo.png" alt="">
            <div class="admin_menu">
                <ul>
                	<li><a href="order.php"><i class="fas fa-shopping-cart"></i>Order</a></li>
                    <li><a href="shipped.php"><i class="fas fa-address-card"></i>Shipped</a></li>
                    <li><a href="category.php"><i class="fas fa-tags"></i>Add Category</a></li>
                    <li><a href="addproduct.php"><i class="fas fa-plus-square"></i>Add Product</a></li>
                    <li><a href="addproductList.php"><i class="fas fa-list"></i>Product List</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="right_box">