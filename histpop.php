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
    <a href="history.php" class="delete">delete</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Words</th>
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
        </tr>
        <?php
        }
        ?>
    </table>


</body>

</html>