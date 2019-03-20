<?php
/* Include db connection */
include_once 'conn.php';

/* Check whether a edit id is given */
if (isset($_GET['edit_id'])){
  $id = $_GET['edit_id'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data</title>

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">

    <div id="header">
      <div class="d-flex">
        <a href="view_data.php"><i class="fas fa-arrow-circle-left i-back"></i></a>
        <h1>Edit Data</h1>
      </div>
    </div>

    <div id="body">

      <?php
      
      /* SQL Query */
      $sql = "SELECT * FROM restaurants WHERE id=$id";

      /* Store result in a variable */
      $result = $conn->query($sql);
      
      /* Check whether the result is not empty */
      if ($result->num_rows > 0){

        /* Change object array to strings */
        $row = $result->fetch_assoc();
        
        /* Save data to local variables */
        $name = $row['name'];
        $location = $row['location'];
        $contact = $row['contact'];
        $rating = $row['rating'];
      }
      ?>

      <!-- Form to display edit data -->      
      <form action="update_data.php?edit_id=<?php echo $id ?>" class="needs-validation" method="post" novalidate>
        <div class="form-group">
          <label for="name">Restaurant Name:</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Restaurant Name" value="<?php echo $name ?>"
            required>
          <div class="valid-feedback">Valid</div>
          <div class="invalid-feedback">Please fill out this field</div>
        </div>
        <div class="form-group">
          <label for="location">Location:</label>
          <input type="text" name="location" id="location" class="form-control" placeholder="Enter Restaurant Location"
            value="<?php echo $location ?>" required>
          <div class="valid-feedback">Valid</div>
          <div class="invalid-feedback">Please fill out this field</div>
        </div>
        <div class="form-group">
          <label for="contact">Contact:</label>
          <input type="tel" name="contact" id="contact" class="form-control" placeholder="Enter Restaurant Contact Numeber"
            value="<?php echo $contact ?>" required>
          <div class="valid-feedback">Valid</div>
          <div class="invalid-feedback">Please fill out this field</div>
        </div>
        <div class="form-group">
          <label for="rating">Rating:</label>
          <select class="form-control" id="rating" name="rating">
            <option value="" selected disabled hidden><?php echo $rating ?></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
          </select>
          <div class="valid-feedback">Valid</div>
          <div class="invalid-feedback">Please fill out this field</div>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-outline-primary btn-custom">Update</button>
        </div>
      </form>

      <?php
      $conn->close();
      ?>

    </div>

  </div>
</body>

</html>

<?php
} else {

  /* Display error if no edit id is given */
  echo "No user is selected!";
}
?>