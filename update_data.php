<?php
include_once 'conn.php';

$id = $_GET['edit_id'];
$name = $_POST['name'];
$location = $_POST['location'];
$contact = $_POST['contact'];
$rating = $_POST['rating'];

$sql = "UPDATE restaurants SET name='$name', location='$location', contact='$contact', rating='$rating' WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header('Location:view_data.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

