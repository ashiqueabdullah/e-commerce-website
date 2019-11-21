<?php
    include'allinks.php';
    include_once 'admin/session.php';
     Session::init();
    include_once 'class/showproduct.php';
   
?>
    <!--Header section start-->
    <div class="my-header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 mymargintop">
                    <a href="index.php">
                        <img class="myimg" src="img/logo.png" alt="logo">
                    </a>
                </div>
                <div class="col-md-8">
                    <center>
                        <a href="searchresult.php" class="btn btn-danger">Search</a>
                    </center>
                </div>
                
                <div class="col-md-2" style="margin-top: 30px">
                     <div class="one-ul">
                        <ul>


<?php 
                                $login=Session::get("clogin");
                                if ($login==true) {
                                    
                                

                            ?>

                            <li><a href="myaccount.php"><i class="icon fa fa-user"></i> My Account</a></li>
                        <?php }?>

                            
                            
                        <?php

                            if (isset($_GET['lgt'])) {
                                $pd=new showProduct();
                                $getpd=$pd->DeleteCart();
                                Session::destroys();
                            }
                        ?>
                            <?php 
                                $login=Session::get("clogin");
                                if ($login==false) {
                                    
                                

                            ?>

                            <li><a href="login.php"><i class="icon fa fa-lock"></i> Registation / Login</a></li>
                        <?php }?>
                        <?php 
                                $login=Session::get("clogin");
                                if ($login==true) {
                                    
                                

                            ?>

                            <li><a href="?lgt=<?php Session::get('id')?>"><i class="icon fa fa-lock"></i> Log Out</a></li>
                        <?php }?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mymenu">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">All Products</a></li>
                
                


                <?php 
                    $object=new showProduct();
                    $getct=$object->getCategory();
                    if (isset($getct)) {
                        while ($res=$getct->fetch_assoc()) { ?>
                    <li><a href="categoryProduct.php?id=<?php echo $res['id']?>"><?php echo $res['categoryName']?></a></li>
                <?php }}?>
                <?php
                    $cheklogin=Session::get("clogin");
                    if ($cheklogin==true) {?>
                <li><a href="cart.php">Cart</a></li>
            <?php }?>
                <li><a href="contuct.php">Contact</a></li>

            </ul>
        </div>
    </div>
<div style="background: white;margin-top: -16px;" class="container">
   