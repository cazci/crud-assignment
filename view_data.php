<?php
include_once 'conn.php';

if (isset($_GET['delete_id'])){
  $sql="DELETE FROM restaurants WHERE id = ".$_GET['delete_id'];
  $conn->query($sql);
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<script type="text/javascript">
  function editRestaurant(id) {
    window.location.href = 'edit_data.php?edit_id=' + id;
  }

  function deleteRestaurant(id, name) {
    if (confirm('Sure to delete ' + name + '?')) {
      window.location.href = 'view_data.php?delete_id=' + id;
    }
  }
</script>

<body>
  <div class="container">

    <div id="header">
      <h1>View Data</h1>
    </div>

    <div id="body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Restaurant ID</th>
            <th>Restaurant Name</th>
            <th>Location</th>
            <th>Contact Number</th>
            <th>Rating</th>
            <th colspan="2">Operations</th>
          </tr>
        </thead>

        <?php
          $sql = "SELECT * FROM restaurants";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
              ?>

        <tbody>
          <tr>
            <td>
              <?php echo $row['id']; ?>
            </td>
            <td>
              <?php echo $row['name']; ?>
            </td>
            <td>
              <?php echo $row['location']; ?>
            </td>
            <td>
              <?php echo $row['contact']; ?>
            </td>
            <td>
              <?php echo $row['rating']; ?>
            </td>
            <td align="center"><a href="javascript:editRestaurant('<?php echo $row['id']; ?>')">Edit</a></td>
            <td align="center"><a href="javascript:deleteRestaurant('<?php echo $row['id']; ?>','<?php echo $row['name']; ?>')">Delete</a></td>
          </tr>
        </tbody>

        <?php
            }
          }
          
          $conn->close();
          ?>
      </table>
    </div>

  </div>
</body>

</html>