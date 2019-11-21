<?php
   include'header.php';
   include_once'class/showproduct.php';
 ?>


	<div class="cart">
		<div class="title">
			<h1>Your Cart</h1>
		</div>
		<div class="tbl_body">
			<table>
				<tr>
					<th>Product Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Action</th>
				</tr>

				<?php
					$pd=new showProduct();
					if (isset($_GET['dlt'])) {
						$id=$_GET['dlt'];
						$dlt=$pd->cartDlt($id);
					}
					$subt=0;
					if ($_SERVER['REQUEST_METHOD']=="POST") {
						//$qup=$pd->qintUp($_POST);
					}
					$getpd=$pd->pdCard();
					if ($getpd) {
						while ($res=$getpd->fetch_assoc()) {
							
						
				?>
				<tr>
					<td><?php echo $res['pdname']?></td>
					<td><img src="admin/uploads/<?php echo $res['image']?>"  alt="" height="100" width="100"></td>
					<td><?php echo $res['price']?></td>
					<td><?php echo $res['qunat']?></td>
					<td>
						<?php 
							$to=$res['price']*$res['qunat'];
							echo $to;
							$subt=$to+$subt;

						?>

					</td>
					<td><a href="?dlt=<?php echo $res['cartid']?>" class="btn btn-danger">Delete</a></td>
				</tr>

<?php }}?>
				
				
			</table>
			<div class="price">
				<p>Total:<?php echo $subt;?></p>
			</div>
		</div>
		<div class="container" style="padding-bottom: 20px;">
			<div class="row">
				<div class="col-md-6">
					<center>
						<a href="product.php" class="btn btn-info">Shoping</a>
					</center>
				</div>
				<div class="col-md-6">
					
					<center>
						<a href="payment.php" class="btn btn-danger">Checkout</a>
					</center>

				</div>
			</div>
		</div>
	</div>

 <?php
	include'footer.php'
?>