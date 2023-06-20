<?php
include "database.php";
$sql = "SELECT * FROM history";

$result = $conn->query($sql);
$conn->close();

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
    <form action="delcheck.php">
        <button type="submit" name="deleteButton">delete</button>
        <h1>History</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Words</th>
                <th>Edit</th>
                <th>Edits</th>
            </tr>
            <?php
            // if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $column1Value = $row["word"];
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $column1Value ?></td>
                <td><a href="del.php?id=<?php echo $id ?>">del</a></td>
                <td>
                    <input type="checkbox" name="delete[]" value="<?php $row['id'] ?>">
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </form>


</body>

</html>