<?php
	include'header.php';
	include_once'class/myphp.php';
?>


<div class="myorder">
	<div class="title">
		<h1>Customer Information</h1>
	</div>
	<div class="mytable">
		<table>
			<?php 
				$id=$_GET['cmid'];
				$object=new getproduct();
				$getpd=$object->getCustonInfo($id);
				if (isset($getpd)) {
					while ($res=$getpd->fetch_assoc()) {
						
					
				

			?>
			<tr>
				<th>Name</th>
				<td><?php echo $res['name']?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td><?php echo $res['address']?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $res['city']?></td>
			</tr>
			<tr>
				<th>Zip</th>
				<td><?php echo $res['zip']?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $res['email']?></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td><?php echo $res['phone']?></td>
			</tr>
		<?php }}?>
		</table>
	</div>
	<a href="order.php" class="btn btn-info">Ok</a>
</div>



<?php
	include'footer.php'
?>