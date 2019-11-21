<?php
	include'header.php';
	include_once'class/myphp.php';
?>


<div class="myorder">
	<div class="title">
		<h1>Shipped  order</h1>
	</div>
	<div class="mytable">
		<table>
			<tr>
				<th>ID</th>
				<th>Customer Name</th>
				<th>Product</th>
				<th>Price</th>
				<th>Address</th>
				<th>Action</th>
			</tr>


			<?php 
				if (isset($_GET['dlt'])) {
					$id=$_GET['dlt'];
					$objet=new getproduct();
					$getorder=$objet->delete($id);
				}
				

			?>
			<?php 
				$objet=new getproduct();
				$getorder=$objet->getshipd();
				$i=0;
				if (isset($getorder)) {
					while ($res=$getorder->fetch_assoc()) {
					$i++;	
					
				
			?>

			<tr>
				<td><?php echo $i?></td>
				<td><?php echo $res['name']?></td>
				<td><?php echo $res['productname']?></td>
				<td><?php echo $res['price']?></td>
				<td><?php echo $res['address']?></td>
				<td><a style="width: 40%; margin-right: 10px;" href="?dlt=<?php echo $res['id']?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php }}?>
		</table>
	</div>
</div>



<?php
	include'footer.php'
?>