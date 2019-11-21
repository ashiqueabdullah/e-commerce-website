<?php
	include'header.php';
	include_once'class/showproduct.php';
?>

    <div style="padding-top: 20px; padding-bottom: 20px;" class="myaccount">
        <div class="container">
            <div class="mytb">
                <?php 
				$object=new showProduct();
				$id=Session::get("id");
				$getcust=$object->getCustmerInfo($id);	
				if (isset($getcust)) {
					while ($res=$getcust->fetch_assoc()) {

				?>
                    <center>

                        <table>
                            <tr>
                                <th>Name:</th>
                                <td>
                                    <?php echo $res['name']?>
                                </td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>
                                    <?php echo $res['address']?>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>
                                    <?php echo $res['phone']?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>
                                    <?php echo $res['email']?>
                                </td>
                            </tr>
                            <tr>
                                <th>City:</th>
                                <td>
                                    <?php echo $res['city']?>
                                </td>
                            </tr>
                            <tr>
                                <th>Zip:</th>
                                <td>
                                    <?php echo $res['zip']?>
                                </td>
                            </tr>
                            <tr>
                                <th>My All order:</th>
                                <td><a class="btn btn-info" href="orderdtls.php">My order</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a class="btn btn-warning" href="edicustomerinfo.php">Edit Profile</a></td>
                            </tr>
                        </table>

                    </center>
                    <?php }}?>
            </div>
        </div>
    </div>

    <?php
	include'footer.php'
?>