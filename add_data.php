<?php
/* Include db connection */
include_once 'conn.php';

/* Get data via post and store in variables */
$name = $_POST['name'];
$location = $_POST['location'];
$contact = $_POST['contact'];
$rating = $_POST['rating'];

/* SQL Query */
$sql = "INSERT INTO restaurants(name, location, contact, rating) VALUES ('$name', '$location', '$contact', '$rating')";

/* Check whether the data has successfully inserted */
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  
  /* Redirects back to view data table */
  header('Location:view_data.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

/* Close db connection */
$conn->close();
?>

