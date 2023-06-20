<?php
include "database.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM history WHERE id = '" . $id . "'";
    $result = $conn->query($sql);
    if ($result) {
        // header("Location:rightnow.php");
        header("Location:history.php");
    } else {
        echo "error";
    }
} else {
    header("Location:rightnow.php");
}
exit;
