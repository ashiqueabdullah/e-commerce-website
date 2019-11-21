<?php
	include'header.php';
	include_once'class/showproduct.php';
?>
<?php
	$login=Session::get("clogin");
	if ($login==true) {
		header("Location:index.php");
	}

?>

	<div class="login_reg">
		<div class="row">
		<div class="col-md-5">
			<div class="login_box">
				<h4>Existing Customers</h4>
				<p>Sign in with the form below.</p>
				<?php 
					$pd=new showProduct();
					if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['login'])) {
						$lgaccess=$pd->cstlogin($_POST);
					}
					if (isset($lgaccess)) {
						echo $lgaccess;
					}
					?>
				<form action="" method="post">
					<input type="email" placeholder="Enter Email" name="email">
					<input type="password" placeholder="Password" name="pass">
					<p>If you forgot your passoword just enter your email and <a href="">click here</a></p></p>
					<input type="submit" value="submit" name="login">
				</form>
			</div>
		</div>
		<div class="col-md-7">
			<div class="registation_box">
				<h4>Register New Account</h4>
				<form action="" method="post">
					<?php 
						$pd=new showProduct();
						if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['register'])) {
							$getpd=$pd->insrtcust($_POST);
						}
						if (isset($getpd)) {
							echo $getpd;
						}
					?>
					<input type="text" name="name" placeholder="Enter your user name">
					<input type="text" name="address" placeholder="Address">
					<input type="text" name="city" placeholder="City">
					<input type="text" name="zip" placeholder="Zip code">
					<input type="text" name="phone" placeholder="Phone">
					<input type="email" name="email" placeholder="Email">
					<input type="password" name="password" placeholder="Password">
					<p>By clicking 'Create Account' you agree to the <a href="">Terms & Conditions</a></p>
					<input type="submit" value="submit" name="register">
				</form>
			</div>
		</div>
	</div>
	</div>

 <?php
	include'footer.php'
?>