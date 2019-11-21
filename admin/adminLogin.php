<?php
include 'adminLoginPHP.php';
?>
<?php
$mylg = new AllLoginFunction();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminName     = $_POST['adminName'];
    $adminPassword = $_POST['adminPassword'];
    $valuePass     = $mylg->adminLogin($adminName, $adminPassword);
}

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>


    <div class="login_page">
        <div class="login_box">
            <form action="" method="post">
                <h1>Admin Login</h1>
                <h1 style="font-size: 15px; color: red;">
                    <?php
                        if (isset($valuePass)) {
                            echo $valuePass;
                        }
                    ?>
                </h1>
                <input type="text" name="adminName" placeholder="User Name">
                <input type="password" name="adminPassword" placeholder="Password">
                <input type="submit" name="sumbit">
            </form>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>