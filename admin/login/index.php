<?php
include '../../db/global_config.php';
include '../db/admin_script.php'; ?>
<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="well col-xs-4 col-xs-offset-4">
            <h4>LOGIN</h4>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="login" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>
                <button class="btn btn-primary" name="login_btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<!--<!-- jQuery -->
<script src="../js/jquery.js"></script>
<!--<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
if (isset($_POST['login_btn'])) {
    $admin_login = $_POST['login'];
    $admin_password = $_POST['password'];
    $admin_login = mysqli_real_escape_string($connection, $admin_login);
    $admin_password = mysqli_real_escape_string($connection, $admin_password);


    $query = "SELECT * FROM admin WHERE login = '$admin_login'";
    $select_admin_query = mysqli_query($connection, $query);

    unset($_SESSION['login']);
    unset($_SESSION['password']);

    $row = mysqli_fetch_array($select_admin_query);
    if (empty($row)) {
        echo "<script type='text/javascript'>alert('Login information is not correct')</script>";
    } else {
        $db_admin_login_id = $row['id'];
        $db_admin_login = $row['login'];
        $db_admin_password = $row['hash'];

        if ($admin_login === $db_admin_login && $admin_password === $db_admin_password) {
            $_SESSION['login'] = $db_admin_login;
            $_SESSION['password'] = $db_admin_password;
            header('Location: ../photos/index.php');
        } else {
            echo "<script type='text/javascript'>alert('Login information is not correct')</script>";
        }
    }
}
?>


