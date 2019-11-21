<?php
	include'header.php';
	include'class/myphp.php';
?>
<?php
	$pd=new product();
	$id=$_GET['id'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$insproduct=$pd->update($_POST, $_FILES,$id);
	}
	
?>

<div class="myorder">
	<div class="title">
		<h1>Edit Product</h1>
	</div>
	<div class="addpd">
		
		<?php
		$id=$_GET['id'];
 			$getpd=$pd->gteAllproduct($id);
 			if (isset($getpd)) {
 				while ($res= $getpd->fetch_assoc()) { 
 		?>
		<form action="" method="POST" enctype="multipart/form-data">


			
			<h2>Product Name</h2>
			<input type="text" name="pdname" value="<?php echo $res['productName']?>">
			<h2>Price</h2>
			<input type="text" name="price" value="<?php echo $res['price']?>">
			<h2>Category</h2>
			<select name="catid" id="id">

			<?php 
					$catg=new category();
					$getcat=$catg->getCat();
					if (isset($getcat)) {
						while ($ress=$getcat->fetch_assoc()){
				?>

				<option value="<?php echo $ress['id']?>"><?php echo $ress['categoryName']?></option>
			<?php } } ?>
			</select>
			</select><br><br>
			<h2 style="margin-top: 0px">Type</h2>
			<select name="type" id="id">
			<option value="0">General</option>
			<option value="1">Feature</option>
			</select>
			<h2>Chose Image</h2>
			<input type="file" name="image">
			<h2>Description</h2>
			<textarea name="body" id="" cols="70" rows="4"><?php echo $res['body']?></textarea><br>
			<input type="submit" value="Save">
		</form>
	<?php }}?>
	</div>
</div>

<?php
	include'footer.php'
?>