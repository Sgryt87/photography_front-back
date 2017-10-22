<?php include 'includes/admin_header.php'; ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Genres
                    </h2>
                </div>

                <div class="col-xs-6">
                    <table class="table table-bordered table-hover">


                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Genre</th>
                        </tr>
                        </thead>
                        <tbody name="genre">

                        <?php

                        $result = getGenres();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $genres_id = $row['id'];
                            $genres_name = $row['name'];

                            echo "<tr>";
                            echo "<td>{$genres_id}</td>";
                            echo "<td>{$genres_name}</td>";
                            echo "<td><a href='genres.php?edit={$genres_id}'>Edit</a></td>";
                            echo "<td><a href='genres.php?delete={$genres_name}'>Delete</a></td>";
                            echo "</tr>";
                        }

                        ?>


                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php'; ?>