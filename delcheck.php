<?php
include 'database.php';
if (isset($_POST["deleteButton"]) && isset($_POST["delete"])) {
    foreach ($_POST["delete"] as $deleteId) {
        $delete = "DELETE FROM history WHERE id = $deleteId";
        mysqli_query($conn, $delete);
    }
    header("Location: history.php");
}