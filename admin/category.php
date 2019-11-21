<?php
	include_once'header.php';
	include_once'class/myphp.php';
?>

<?php
	$category= new category();
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$ctname=$_POST['ctname'];
		$valuepass=$category->ctinsert($ctname);
	}
	if (!isset($_GET['dlt']) || $_GET['dlt']==NULL) {
		
	}else{
		$id=$_GET['dlt'];
		$dltct=$category->dlt($id);
	}
?>


<div class="myorder">
	<div class="title">
		<h1>All category</h1>
	</div>
	<div class="left_boxs">
		<form action="" method="post">
			<?php
				if (isset($valuepass)) {
					echo $valuepass;
				}
				if (isset($dltct)) {
					echo $dltct;
				}
			?>
			<div class="level">Add category</div>

			<input type="text" placeholder="Enter category name" name="ctname">
			<input type="submit" name="submit" value="Save">
		</form>
	</div>
	<div class="right_boxs">
		<h3 class="level">Category list</h3>
		<table>
			<tr>
				<th>ID</th>
				<th>Category Name</th>
				<th>Action</th>
			</tr>
			<?php
				$getCat=$category->getCat();
				if ($getCat) {
					$i=0;
					while ($result=$getCat->fetch_assoc()) {
					$i++;
					
			?>
			<tr>
				<td><?php echo $i?></td>
				<td><?php echo $result['categoryName']?></td>
				<td><a style="margin-right: 10px;color: white" class="btn btn-info" href="categoryEditPHP.php?id=<?php echo $result['id']?>">Edit</a><a onclick="return confirm('Are you sure to Delete this category?')" class="btn btn-danger" style="color: white" href="?dlt=<?php echo $result['id']?>">Delete</a></td>
			</tr>
			<?php 
				}
				}
				?>
		</table>
	</div>
</div>


<?php
	include'footer.php'
?>