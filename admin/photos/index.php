<?php include '../includes/admin_header.php';
$page_num = 1;
if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
}
$genre = 'All';
if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
}
?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Photos <a href="add.php" class="btn btn-primary">Upload</a>
                    </h2>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-xs-4">
                    <form action="index.php" method="get">
                        <select name="genre" id="" class="form-control" onchange="this.form.submit()">
                            <?php
                                if($genre === 'All') {
                                    echo "<option value='All' selected='selected'>All</option>";
                                } else {
                                    echo "<option value='All'>All</option>";
                                }
                            $result = getGenres();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $genres_id = $row['id'];
                                $genres_name = $row['name'];
                                if($genres_id === $genre) {
                                    echo "<option value='$genres_id' selected='selected'>$genres_name</option>";
                                } else {
                                    echo "<option value='$genres_id'>$genres_name</option>";
                                }
                            }
                            ?>
                        </select>
                    </form>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Genre</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($genre === 'All') {

                        $result = getPhotos($page_num);
                        while ($row = mysqli_fetch_assoc($result)) {

                            $photo_id = $row['id'];
                            $photo_name = $row['name'];
                            $photo_genre = $row['genreid'];
                            $photo_created = $row['created'];

                            echo '<tr>';
                            echo "<td>$photo_id</td>";
                            echo "<td><img width='100' src='../../photos/$photo_name' title='$photo_name'></td>";
                            echo "<td>" . getGenreById($photo_genre) . "</td>";
                            echo "<td>$photo_created</td>";
                            echo "<td><a href='edit.php?p_id={$photo_id}' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='delete.php?p_id={$photo_id}' class='btn btn-primary'>Delete</a></td>";
                            echo '</tr>';
                        }
                    } else {
                        $photos_by_genre = getPhotosByGenre($genre, $page_num);
                        while ($row = mysqli_fetch_assoc($photos_by_genre)) {
                            $photo_id = $row['id'];
                            $photo_name = $row['name'];
                            $photo_created = $row['created'];

                            echo '<tr>';
                            echo "<td>$photo_id</td>";
                            echo "<td><img width='100' src='../../photos/$photo_name' title='$photo_name'></td>";
                            echo "<td>" . getGenreById($genre) . "</td>";
                            echo "<td>$photo_created</td>";
                            echo "<td><a href='edit.php?p_id={$photo_id}' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='delete.php?p_id={$photo_id}' class='btn btn-primary'>Delete</a></td>";
                            echo '</tr>';
                        }
                    }
                    ?>
                    </tbody>
                </table>

                <?php
                if ($genre === 'All') {
                    $photos_count = getPhotosCount();
                } else {
                    $photos_count = getPhotosCountByGenre($genre);
                }
                $page_count = ceil($photos_count / 10.0);
                if ($page_count > 1) {
                    echo "<ul class='pager'>";
                    for ($i = 1; $i <= $page_count; $i++) {
                        echo "<li><a href='index.php?page=$i&genre=$genre' class='active_link'>$i</a></li>";
                    }
                    echo "</ul>";
                }
                ?>

            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include '../includes/admin_footer.php'; ?>