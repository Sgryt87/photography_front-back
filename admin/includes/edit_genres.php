<?php
if (isset($_GET['g_id'])) {
    $the_genres_id = $_GET['g_id'];
}
$query = "SELECT * FROM posts WHERE post_id = $the_genres_id";
$select_geres_by_id = mysqli_query($connection, $query);
if (!$select_geres_by_id) {
    die('Query Failed' . mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($select_geres_by_id)) {

    $genres_id = $row['id'];
    $genres_name = $row['name'];
}

$query = "UPDATE genres SET
      `name` ='{$genres_name}'
      WHERE id = {$the_genres_id}";

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_genres" value="Update Genres">
</div>

</form>



<!--<form action="" method="post">-->
<!--    <div class="form-group">-->
<!--        <label for="name_edit">Edit Genre</label>-->
<!--        <input type="text" class="form-control" name="name_edit">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">-->
<!--    </div>-->
<!---->
<!--</form>-->