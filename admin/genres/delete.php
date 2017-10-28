<?php include "../db/admin_script.php"; ?>
<?php
connection();
if (isset($_GET['g_id'])) {
    $the_genres_id = $_GET['g_id'];
    deleteGenre($the_genres_id);
    header("Location: index.php");
}
?>