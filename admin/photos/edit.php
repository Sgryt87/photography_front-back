<?php include '../includes/admin_header.php';

$photo_id = escape($_GET['p_id']);

$photo = getPhotoById($photo_id);

if (isset($_POST['edit_btn'])) {

    $post_photo = $_FILES['image']['name'];
    $post_photo_temp = $_FILES['image']['tmp_name'];
//    var_dump($post_photo);
//    var_dump($post_photo_temp);
//    die();
    $post_genre_id = escape($_POST['genre']);
    if ($post_photo != "") {
        if (!file_exists(__DIR__ . "../../../photos/$post_photo")) {
            move_uploaded_file($post_photo_temp, __DIR__ . "../../../photos/$post_photo");
            addPhoto($post_photo, $post_genre_id);
            header("Location: index.php");
        } else {
            echo "<script type='text/javascript'>alert('This file already exists');</script>";
        }
    } else {
        editPhotoGenre($photo_id, $post_genre_id);
        header("Location: index.php");
    }
}

?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Edit photo
                    </h2>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <img src="<?php echo '../../photos/' . $photo['name']; ?>" alt="" width="200px;" name="image">
                    </div>

                    <div class="form-group">
                        <label for="image">Add Photo</label>
                        <input type="file" class="form-control" name="image" value="">
                    </div>

                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <select name="genre" id="">
                            <?php
                            $result = getGenres();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $genres_id = $row['id'];
                                $genres_name = $row['name'];

                                if ($genres_id === $photo["genreid"]) {
                                    echo "<option value='$genres_id' selected='selected'>{$genres_name}</option>";
                                } else {
                                    echo "<option value='$genres_id'>{$genres_name}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="edit_btn" value="Submit">
                    </div>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include '../includes/admin_footer.php'; ?>