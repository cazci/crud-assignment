<?php
include_once 'conn.php';

$name = $_POST['name'];
$location = $_POST['location'];
$contact = $_POST['contact'];
$rating = $_POST['rating'];

$sql = "INSERT INTO restaurants(name, location, contact, rating) VALUES ('$name', '$location', '$contact', '$rating')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location:view_data.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

