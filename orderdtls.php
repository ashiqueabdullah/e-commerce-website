<?php
   include'header.php';
   include_once'class/showproduct.php';
 ?>

    <div class="cart">
        <div class="title">
            <h1>Order Details</h1>
        </div>
        <div class="tbl_body">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
					$pd=new showProduct();
					$id=Session::get("id");
					$getpd=$pd->pdorder($id);
					if ($getpd) {
						while ($res=$getpd->fetch_assoc()) {

				?>
                    <tr>
                        <td>
                            <?php echo $res['productname']?>
                        </td>
                        <td><img src="admin/uploads/<?php echo $res['image']?>" alt="" height="100" width="100"></td>
                        <td>
                            <?php echo $res['price']?>
                        </td>
                        <td>
                            <?php echo $res['quntutuy']?>
                        </td>
                        <td>
                            <?php 
								$to=$res['price']*$res['quntutuy'];
								echo $to;

							?>

                        </td>
                        <?php 
							if ($res['st']=="0") {?>
                            <td>Pending</td>
                            <?php }?>

                                <?php 
							if ($res['st']=="1") {?>
                                    <td>Shift</td>
                                    <?php }?>

                                        <?php
							if (isset($_GET['dlt'])) {
								$id=$_GET['dlt'];
								$pd=new showProduct();
								$dlt=$pd->deleteOrder($id);
							}
						?>

                        <?php 
							if ($res['st']=="0") {?>
                                <td><a href="?dlt=<?php echo $res['id']?>" class="btn btn-danger">Delete</a></td>
                        <?php }?>

                        <?php 
							if ($res['st']=="1") {?>
                                <td style="text-align: center;">N/A</td>
                        <?php }?>

                    </tr>

                    <?php }}?>

            </table>

        </div>
        <div class="container" style="padding-bottom: 20px;">
        </div>
    </div>

    <?php
	include'footer.php'
?>