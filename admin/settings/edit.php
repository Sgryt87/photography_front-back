<?php include "../includes/admin_header.php"; ?>

<?php
$admin_id = $_GET['a_id'];

$result = getAdmin();
while ($row = mysqli_fetch_assoc($result)) {
    $admin_id = $row['id'];
    $admin_login = $row['login'];
    $admin_email = $row['email'];
    $admin_password = $row['hash'];
}


if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($connection, $_POST['login']);
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $pass1 = mysqli_real_escape_string($connection, trim($_POST['password']));
    $pass2 = mysqli_real_escape_string($connection, trim($_POST['confirm_password']));
    if ($pass1 === $pass2) {
        $hash = password_hash($pass1, PASSWORD_DEFAULT);
        updateAdmin($admin_id, $name, $email, $hash);
        $_SESSION['success'] = true;
        header('Location: index.php');
    } else {
        echo "<script>alert('Please re-enter your password, it didn\'t match')</script>";
    }

}


?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="login">Login</label>
                            <input value="<?php echo $admin_login; ?>" type="text" class="form-control" name="login">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="<?php echo $admin_email; ?>" type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input value="" type="password" class="form-control"
                                   name="password">
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Re-enter Your Password</label>
                            <input value="" type="password" name="confirm_password" class="form-control"
                                   name="password">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "../includes/admin_footer.php"; ?>