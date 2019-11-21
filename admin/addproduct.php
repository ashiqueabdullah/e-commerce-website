<?php
	include'header.php';
	include'class/myphp.php';
?>
    <?php
	$pd=new product();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$insproduct=$pd->productInst($_POST, $_FILES);
	}

?>

        <div class="myorder">
            <div class="title">
                <h1>Add Product</h1>
            </div>
            <div class="addpd">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php 
			if (isset($insproduct)) {
				echo $insproduct;
			}

			?>
                        <h2>Product Name</h2>
                        <input type="text" name="pdname">
                        <h2>Price</h2>
                        <input type="text" name="price">
                        <h2>Category</h2>
                        <select name="catid" id="id">

                            <?php 
					$catg=new category();
					$getcat=$catg->getCat();
					if (isset($getcat)) {
						while ($res=$getcat->fetch_assoc()){
				?>

                                <option value="<?php echo $res['id']?>">
                                    <?php echo $res['categoryName']?>
                                </option>
                                <?php } } ?>
                        </select>
                        <br>
                        <br>
                        <h2 style="margin-top: 0px">Type</h2>
                        <select name="type" id="id">
                            <option value="0">General</option>
                            <option value="1">Feature</option>

                        </select>
                        <h2>Chose Image</h2>
                        <input type="file" name="image">
                        <h2>Description</h2>
                        <textarea name="body" id="" cols="70" rows="4"></textarea>
                        <br>
                        <input type="submit" value="Save">
                </form>
            </div>
        </div>

        <?php
	include'footer.php'
?>