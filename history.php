<?php
// include "database.php";
$conn = mysqli_connect("localhost", "root", "", "mydb");
if (isset($_GET["delete"]) && isset($_GET["checkbox"])) {
    foreach ($_GET["checkbox"] as $deleteId) {
        $delete = "DELETE FROM history WHERE id = $deleteId";
        mysqli_query($conn, $delete);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/history.css">
</head>

<body>
    <a href="rightnow.php" class="toggleback">Back</a>
    <h1>History</h1>
    <table class="table">
        <form action="" method="get">
            <button type="submit" name="delete" class="delbtn">Delete</button>
            <br>
            <tr>
                <th>ID</th>
                <th>Words</th>
                <th>Edit</th>
                <th>Edits</th>
            </tr>
            <?php
            // if ($result->num_rows > 0) {
            $sql = "SELECT * FROM history";
            $result = $conn->query($sql);
            // while ($row = $result->fetch_assoc()) {
            foreach ($result as $row) :
                $id = $row["id"];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $row["word"]; ?></td>
                    <td><a href="del.php?id=<?php echo $id ?>">del</a></td>
                    <td align=center>
                        <input type="checkbox" name="checkbox[]" value="<?php echo $row['id']; ?>">
                    </td>
                </tr>
            <?php
            // }
            endforeach;
            ?>
        </form>
    </table>

</body>

</html>