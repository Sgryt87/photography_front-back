<?php include '../includes/admin_header.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        Settings
                    </h2>
                    <?php
                    if (isset($_SESSION['success'])) {

                        echo " <div class=\"alert alert-success\">
                                 <strong>Success!</strong>
                               </div>";
                        unset($_SESSION['success']);
                    }
                    ?>
                    <table class="table table-bordered table-hover">


                        <thead>
                        <tr>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody name="admin">
                        <?php
                        $result = getAdmin();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $admin_id = $row['id'];
                            $admin_login = $row['login'];
                            $admin_email = $row['email'];
                            $admin_password = $row['hash'];

                            echo "<tr>";
                            echo "<td>{$admin_login}</td>";
                            echo "<td>{$admin_email}</td>";
                            echo "<td>{$admin_password}</td>";
                            echo "<td><a href='edit.php?a_id={$admin_id}' class='btn btn-primary'>Edit</a></td>";
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
<?php include '../includes/admin_footer.php'; ?>