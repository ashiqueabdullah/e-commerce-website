<?php
	include'header.php';
	include_once'class/showproduct.php';
?>

<div style="padding-top: 20px; padding-bottom: 20px;" class="myaccount">
	<div class="container">
		<div class="mytb">
			<?php 
			$id=Session::get("id");
			$object=new showProduct();
			if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])) {
				$is=$object->UpdateCustomerInfo($_POST,$id);
				if ($is) {
					header("Location:myaccount.php");
				}
			}

			?>
			<?php 
				$object=new showProduct();
				$id=Session::get("id");
				$getcust=$object->getCustmerInfo($id);	
				if (isset($getcust)) {
					while ($res=$getcust->fetch_assoc()) {?>
			
				<center>
					<form action="" method="post">
						<input type="text" name="name" value="<?php echo $res['name']?>"><br><br>
						<input type="text" name="phone" value="<?php echo $res['phone']?>"><br><br>
						<input type="text" name="address" value="<?php echo $res['address']?>"><br><br>
						<input type="text" name="city" value="<?php echo $res['city']?>"><br><br>
						<input type="text" name="zip" value="<?php echo $res['zip']?>"><br><br>
						<input type="email" name="email" value="<?php echo $res['email']?>"><br><br>
						<input type="submit" name="submit" value="Save">
					</form>
				</center><br>
			
			<?php }}?>
		</div>
	</div>
</div>
	


 <?php
	include'footer.php'
?>