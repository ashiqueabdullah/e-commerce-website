<?php
	include_once'class/showproduct.php';
?>
<?php
				if (isset($_GET['usearch'])) {
					$data=$_GET['usearch'];
					$object=new showProduct();
					$res=$object->srch($data);
					if (isset($res)) {
						while ($ress=$res->fetch_assoc()) {
							
						
					
				
				
		?>
		

				<a style="text-decoration: none;" href="details.php?pdid=<?php echo $ress['id']?>">
					<div class="all_product_box">
                	<center>
                    	<img class="product_image" src="admin/uploads/<?php echo $ress['image']?>" alt="" width="200" height="200">
                    	<h4><?php echo $ress['productName']?></h4>
                    	<p style="color: #389583">
							<?php 
                            $des=$ress['body'];
                                
                                $get=$object->limit_words($des,10);
                                echo $get;
                        ?>
                    	</p>
                        <h4 style="color: #5CDB94;font-weight: bold;font-size: 40px;"><?php echo $ress['price']?></h4>
                    	<a style="text-decoration: none;" href="details.php?pdid=<?php echo $ress['id']?>" class="btn btn-info">Details</a>
                    </center>
                </div>
                </a>


		<?php }}} ?>