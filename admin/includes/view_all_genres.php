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
        echo "<td><a href='genres.php?source=edit_post&g_id={$genres_id}'>Edit</a></td>";
        echo "<td><a href='genres.php?delete={$genres_id}'>Delete</a></td>";
        echo "</tr>";
    }

    ?>

    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $the_genres_id = $_GET['delete'];
    $query = "DELETE FROM genres WHERE id = {$the_genres_id}";
    $delete_genres = mysqli_query($connection, $query);
    confirmQuery($delete_genres);
    header("Location: genres.php");
}
?>