<?php include "../includes/admin_header.php"; ?>

<?php
$genres_id = $_GET['g_id'];
$genres_name = getGenreById($genres_id);

if (isset($_POST['update_genres'])) {

    updateGenre($genres_id, $_POST['genre_name']);

    header('Location: index.php');
}


?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">

                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input value="<?php echo $genres_name; ?>" type="text" class="form-control" name="genre_name">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update_genres" value="Update Genres">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include "../includes/admin_footer.php"; ?>

