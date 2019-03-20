<?php
/* Include db connection */
include_once 'conn.php';

/* Get data via post and store in variables */
$id = $_GET['edit_id'];
$name = $_POST['name'];
$location = $_POST['location'];
$contact = $_POST['contact'];
$rating = $_POST['rating'];

/* SQL Query */
$sql = "UPDATE restaurants SET name='$name', location='$location', contact='$contact', rating='$rating' WHERE id=".$id;

/* Check whether the data has successfully inserted */
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  /* Redirects back to view data table */
  header('Location:view_data.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

/* Close db connection */
$conn->close();
?>

