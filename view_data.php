<?php
/* Include db connection */
include_once 'conn.php';

/* Delete data if delete id is given*/
if (isset($_GET['delete_id'])){
  $sql="DELETE FROM restaurants WHERE id = ".$_GET['delete_id'];
  $conn->query($sql);
  header('Location:view_data.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Data</title>

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Font AWesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Override CSS -->
  <link rel="stylesheet" href="main.css">

  <!-- Bootstrap js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
    /* Function to direct to edit data page with a GET request */
    function editRestaurant(id) {
      window.location.href = 'edit_data.php?edit_id=' + id;
    }

    /* Function to display delete alert */
    function deleteRestaurant(id, name) {
      if (confirm('Sure to delete ' + name + '?')) {
        window.location.href = 'view_data.php?delete_id=' + id;
      }
    }
  </script>
</head>

<body>
  <div class="container">

    <div id="header">
      <h1>View Data</h1>
    </div>

    <div id="body">
      <table class="table table-hover">

        <tr class="table-head">
          <th>Restaurant ID</th>
          <th>Restaurant Name</th>
          <th>Location</th>
          <th>Contact Number</th>
          <th>Rating</th>
          <th colspan="2"></th>
        </tr>
        
        <?php

          /* SQL Query */
          $sql = "SELECT * FROM restaurants";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
              ?>

        <!-- Iterate through rows to display data in a table -->
        <tbody>
          <tr>
            <td align="center">
              <?php echo $row['id']; ?>
            </td>
            <td align="center">
              <?php echo $row['name']; ?>
            </td>
            <td align="center">
              <?php echo $row['location']; ?>
            </td>
            <td align="center">
              <?php echo $row['contact']; ?>
            </td>
            <td align="center">
              <?php echo $row['rating']; ?>
            </td>
            <td align="center"><a href="javascript:editRestaurant('<?php echo $row['id']; ?>')"><i class="far fa-edit i-custom"></i></a></td>
            <td align="center"><a href="javascript:deleteRestaurant('<?php echo $row['id']; ?>','<?php echo $row['name']; ?>')"><i class="far fa-trash-alt i-custom"></i></a></td>
          </tr>
        </tbody>

        <?php
            }
          }

          /* Close db connection */
          $conn->close();
          ?>
      </table>
    </div>

    <div class="footer">
      <center>

        <!-- Button to direct to add new data page -->
        <button type="button" class="btn btn-outline-primary btn-custom btn-custom-wide" onclick="location.href='add_data.html'">Insert New Row</button>
      </center>
    </div>

  </div>
</body>

</html>