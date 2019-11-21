<?php
	include'header.php';
	include_once'class/myphp.php';
?>


<div class="myorder">
	<div class="title">
		<h1>All Order</h1>
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
				if (isset($_GET['shp'])) {
					$id=$_GET['shp'];
					$objet=new getproduct();
					$getorder=$objet->shipd($id);
				}

			?>
			<?php 
				$objet=new getproduct();
				$getorder=$objet->getorder();
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
				<td><a href="?dlt=<?php echo $res['id']?>" class="btn btn-danger">Delete</a><a href="?shp=<?php echo $res['id']?>" class="btn btn-info">Shipd</a><a  href="customerinfo.php?cmid=<?php echo $res['cmid']?>" class="btn btn-warning">View Profile</a>
				</td>
			</tr>
			<?php }}?>
		</table>
	</div>
</div>



<?php
	include'footer.php'
?>