<?php
	include_once'header.php';
	include_once'class/myphp.php';
?>

<?php
	$category= new category();
	if (!isset($_GET['id']) || $_GET['id']==NULL) {
	echo "<script>window.location='catagory.php'</script>";
	}
	else{
	$id=$_GET['id'];
	}
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$ctname=$_POST['ctname'];
		$valuepass=$category->ctupdate($ctname,$id);
	}

?>


<div class="myorder">
	<div class="title">
		<h1>Update category</h1>
	</div>
	<div class="left_boxs">
		<?php
		$getCagtId=$category->getCatById($id);
	if (isset($getCagtId)) {
		while ($res=$getCagtId->fetch_assoc()) {
		
		
		?>
		<form action="" method="post">
			<?php
				if (isset($valuepass)) {
					echo $valuepass;
				}
			?>
			<div class="level">Edit category</div>
			<input type="text" value="<?php echo $res['categoryName']?>" placeholder="Enter category name" name="ctname">
			<input type="submit" name="submit" value="Save">
		</form>
	<?php }}?>
	</div>
</div>


<?php
	include'footer.php'
?>