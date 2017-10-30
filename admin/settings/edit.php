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
    updateAdmin($admin_id, $_POST['login'], $_POST['email'], $_POST['password']);
        header ('Location: index.php');
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
                            <input value="<?php echo $admin_password; ?>" type="password" class="form-control"
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