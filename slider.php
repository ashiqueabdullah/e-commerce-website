<?php
    include_once'class/showproduct.php';
?>

<div class="mysilder">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="item_product">
					<?php
		                    $spd=new showProduct();
		                    $getpd=$spd->getAllFeture();
		                    if (isset($getpd)) {
		                        $i=0;
		                        while ($res=$getpd->fetch_assoc()) {
		                        $i++;
		                         if ($i==5) {
		                         	break;
		                         }
		                           
		                        
		                	?>
					<div class="product_box">
						<div class="row">
							<div class="col-md-5">
								<img class="product_image" src="admin/uploads/<?php echo $res['image']?>" alt="" height="100" width="100">
							</div>
							<div class="col-md-7">
								<h4><?php echo $res['productName']?></h4>
								<p>

								<?php 
								$des=$res['body'];
								
								$get=$spd->limit_words($des,2);
								echo $get;
								?>
									
								</p>
								<a href="details.php?pdid=<?php echo $res['id']?>" class="btn btn-info">Add to Cart</a>
							</div>
						
						</div>
						
					</div>
					<?php }}?>
					
				</div>
			</div>
			<div class="col-md-6">
				<div class="owl-carousel">
					<div class="sldimage">
						<img src="img/sliders/01.jpg" alt="">
						<div class="contents">
							<h5>Top Brands</h5>
							<h3> New Collections</h3>
							<button class="btn btn-info">Shop Now</button>
						</div>
					</div>
					<div class="sldimage">
						<img src="img/sliders/02.jpg" alt="">
						<div class="contents">
							<h5>Top Brands</h5>
							<h3> New Collections</h3>
							<button class="btn btn-info">Shop Now</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
