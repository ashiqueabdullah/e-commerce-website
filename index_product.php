<?php
    include_once'class/showproduct.php';
?>

    <div class="myproduct">
        <div class="container">
            <div class="title">
                <h1>NEW PRODUCTS</h1>
            </div>
            <div class="all_product">
                <?php
                    $spd=new showProduct();
                    $getpd=$spd->getAllproduct();
                    if (isset($getpd)) {
                        $i=0;
                        while ($res=$getpd->fetch_assoc()) {
                          $i++;
                          if ($i==17) {
                                break;
                            }  

                ?>
                    <a href="details.php?pdid=<?php echo $res['id']?>">
                        <div class="all_product_box">
                            <center>
                                <img class="product_image" src="admin/uploads/<?php echo $res['image']?>" alt="">
                                <h4><?php echo $res['productName']?></h4>
                                <p style="color: #389583">
                                    <?php 
                                        $des=$res['body'];
                                
                                $get=$spd->limit_words($des,10);
                                echo $get;
                                    ?>
                                </p>
                                <h4 style="color: #5CDB94;font-weight: bold;font-size: 40px;">$<?php echo $res['price']?></h4>
                                <a href="details.php?pdid=<?php echo $res['id']?>" class="btn btn-info">Details</a>
                            </center>
                        </div>
                    </a>
                    <?php }}?>
            </div>
        </div>
    </div>