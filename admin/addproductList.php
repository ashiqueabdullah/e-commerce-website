<?php
	include'header.php';
	include'class/myphp.php';
?>



<div class="myorder">
	<div class="title">
		<h1>Product List</h1>
	</div>
	<div class="mytable">
		<table>
			<tr>
				<th>ID</th>
				<th>Product Name</th>
				<th>Type</th>
				<th>Image</th>
				<th>Category</th>
				<th>Description</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
			
			<?php
			
			$pd=new product();
			if (!isset($_GET['dlt']) || $_GET['dlt']==NULL) {
		
			}else{
				$id=$_GET['dlt'];
				$dltp=$pd->dltProductforlist($id);
			}
			
			$getPd=$pd->gteAllproductforlist();
			$i=0;
			if (isset($getPd)) {
				while ($res=$getPd->fetch_assoc()) {
					$i++;
			?>

			<tr>
				<td><?php echo $i?></td>
				<td><?php echo $res['productName']?></td>
				<td>
				<?php 
					if ($res['type']=="0") {
						echo "General";
					}elseif($res['type']=="1"){
						echo "Feature";
					}
				
				?>
				</td>
				<td><img src="uploads/<?php echo $res['image']?>" alt="" height="50" width="50"></td>
				<td><?php echo $res['categoryName']?></td>
				<td><?php echo $res['body']?></td>
				<td>$<?php echo $res['price']?></td>
				<td><a href="addproductEDIT.php?id= <?php echo $res['id']?>" style="margin-right: 10px; margin-bottom:5px; width: 100%;" class="btn btn-info">Edit</a ><a onclick="return confirm('Are you sure to delete this product')" href="?dlt=<?php echo $res['id']?>" class="btn btn-danger">Delete</a >
				</td>
			</tr>
		<?php }}?>
		</table>
	</div>
</div>


<?php
	include'footer.php'
?>