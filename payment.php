<?php
	include'header.php';
	include_once'class/showproduct.php';
?>

<?php

	if (isset($_GET['id']) && $_GET['id']=="orderid") {
		$object=new showProduct();
		$cid=Session::get("id");
		$insorder=$object->InsertOrder($cid);
	}
?>


<div class="mypayment">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<table>
					<tr>
						<td>ID</td>
						<td>Product Name</td>
						<td>Quntity</td>
						<td>Price</td>
						<td>Toatl Price</td>
					</tr>
				<?php 
				$object=new showProduct();
				$getpd=$object->ProductForPayment();

				if (isset($getpd)) {
					$i=0;
					$totalpay=0;
					while ($res=$getpd->fetch_assoc()) {
						$i++;
					
				
				?>
				
					<tr>
						<td><?php echo $i?></td>
						<td><?php echo $res['pdname']?></td>
						<td><?php echo $res['qunat']?></td>
						<td>$<?php echo $res['price']?></td>
						<td>$<?php 
						$pri=$res['price']*$res['qunat'];
						echo $pri;
						$totalpay=$pri+$totalpay;


						?>
							
						</td>
					</tr>
					<?php  }}?>
				</table>
			<br><br>
			<p>Total payable amount $ <?php echo $totalpay; ?></p>
			
			</div>
			<div class="col-md-6">
				<?php 
				$object=new showProduct();
				$id=Session::get("id");
				$getcust=$object->getCustmerInfo($id);	
				if (isset($getcust)) {
					while ($res=$getcust->fetch_assoc()) {
						
					
				
				?>
			<center>
				
				<table>
			<tr>
				<td>Name:</td>
				<td><?php echo $res['name']?></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><?php echo $res['address']?></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><?php echo $res['phone']?></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><?php echo $res['email']?></td>
			</tr>
			<tr>
				<td>City:</td>
				<td><?php echo $res['city']?></td>
			</tr>
			<tr>
				<td>Zip:</td>
				<td><?php echo $res['zip']?></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="edicustomerinfo.php" class="btn btn-success">Update Profile</a></td>
			</tr>
		</table>
	
			</center>
			<?php }}?>
			</div>
			
		</div>
		<center>
				<a href="?id=orderid" class="btn btn-danger">Oder</a>
			</center>
	</div>
</div>

 <?php
	include'footer.php'
?>