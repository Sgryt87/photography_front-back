<?php include '../includes/admin_header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    Genres
                </h2>
                <table class="table table-bordered table-hover">


                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Genre</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                        echo "<td><a href='edit.php?g_id={$genres_id}' class='btn btn-primary' class='btn btn-primary'>Edit</a></td>";
                        echo "<td><a href='delete.php?g_id={$genres_id}' class='btn btn-primary' class='btn btn-primary'>Delete</a></td>";
                        echo "</tr>";
                    }

                    ?>

                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Add Genre</a>
            </div>
            <div class="row">

                <!--                add -->

                <!--                edit-->
                <div class="col-xs-3">

                </div>


                <div class="col-xs-6">


                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include '../includes/admin_footer.php'; ?>






