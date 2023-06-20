<?php
include "database.php";
// Retrieve the data from the form
$word = $_POST['word'];

$sql = "INSERT INTO history (word) VALUES ('$word')";

if ($conn->query($sql) === TRUE) {
    header("Location: rightnow.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>