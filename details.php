<?php
   include'header.php';
   include_once'class/showproduct.php';
   ?>
<?php
   $pd=new showProduct();
   $checklogin=Session::get("clogin");
    if (isset($_GET['pdid'])) {
      $id=$_GET['pdid'];
    }
    if ($_SERVER['REQUEST_METHOD']=='POST' ) {
      if ($checklogin==true) {
        $id=$_GET['pdid'];
        $insp=$pd->addCart($_POST,$id);
      }else{
        header("Location:login.php");
      }
      
    } 
   ?>
<div class="mydetails">
   <div class="row">
      <?php 
         $getpd=$pd->detailspd($id);
          if ($getpd) {
            while ($res=$getpd->fetch_assoc()) { 
            $rt=$res['catid']; 
            $rtid=$res['id'];
         ?>
      <div class="col-md-4">
         <div class="img_box">
            <img class="myimgs" src="admin/uploads/<?php echo $res['image']?>" alt="">
         </div>
      </div>
      <div class="col-md-6">
         <div class="desc_box">
            <h1><?php echo $res['productName']?></h1>
            <p><?php echo $res['body']?></p>
            <p>Price: <span>$<?php echo $res['price']?></span></p>
            <p>Category: <span><?php echo $res['categoryName']?></span></p>
            <form action="" method="POST">
               <input type="number" value="1" name="qunt">
               <input type="submit" value="Buy Now">
            </form>
         </div>
      </div>
    <?php }}?>
      <div class="col-md-12">
         <div class="product_details">
            <h1>Related Product</h1>
            <div class="row">
               <div class="col-md-12">
                  <?php
                     $spd=new showProduct();
                     $getpd=$spd->reletedProduct($rt);
                     if (isset($getpd)) {
                         $i=0;
                         while ($res=$getpd->fetch_assoc()) {
                           $i++;
                           if ($i==6) {
                               break;
                             }
                          if ($rtid==$res['id']) {
                              continue;
                            }  
                         
                     ?>
                  <a href="details.php?pdid=<?php echo $res['id']?>">
                     <div class="all_product_box">
                        <center>
                           <img class="product_image" src="admin/uploads/<?php echo $res['image']?>" alt="">
                           <h4><?php echo $res['productName']?></h4>
                           <p style="color: #389583"><?php 
                                  $des=$res['body'];
                                  
                                  $get=$spd->limit_words($des,7);
                                  echo $get;
                              ?></p>
                           <h4 style="color: #5CDB94;font-weight: bold;font-size: 40px;">$<?php echo $res['price']?></h4>
                  <a href="details.php?pdid=<?php echo $res['id']?>" class="btn btn-info">Details</a>
                  </center>
                  </div>
                  </a>
                  <?php }}?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   include'footer.php';
?>