<?php include '../db/script.php' ?>
<?php session_start(); ?>

<?php
if (isset($_POST['login_btn'])) {
    $admin_login = $_POST['login'];
    $admin_password = $_POST['pswd'];
}

connection();
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connection) {
        die('Database connection failed' . mysqli_error($connection));
    }
$query = "SELECT * FROM admin WHERE id = '$admin_login'";
$select_admin_query = mysqli_query($connection, $query);
$admin_login = mysqli_real_escape_string($connection, $admin_login);
$admin_password = mysqli_real_escape_string($connection, $admin_password);

while ($row = mysqli_fetch_array($select_admin_query)) {
    $db_admin_login_id = $row['id'];
    $db_admin_login = $row['login'];
    $db_admin_password = $row['pswd'];
}
    if($admin_login === $db_admin_login && $admin_password === $db_admin_password) {
    $_SESSION['login'] = $db_admin_login;
    $_SESSION['pswd'] = $db_admin_password;
    header('Location: ../admin');
    } else {
    header('Location: ../index.php');
    }

?>


