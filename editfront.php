<?php
// Database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "inventorymanagement";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Add function
if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $sql = "INSERT INTO frontend (name) VALUES ('$name')";
  if (mysqli_query($conn, $sql)) {
    echo "Record added successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

// Delete function
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "DELETE FROM frontend WHERE id=$id";
  mysqli_query($conn, $sql);
}

// Edit function
if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $sql = "UPDATE frontend SET name='$name' WHERE id=$id";
  mysqli_query($conn, $sql);
}

// Retrieve data
$sql = "SELECT * FROM frontend";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
  <title>Example Table</title>
</head>

<body>
  <h1>Example Table</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td>
          <a href="editfront.php?delete=<?php echo $row['id']; ?>">Delete</a>
          <a href="editconfig_front.php?id=<?php echo $row['id']; ?>">Edit</a>
        </td>
      </tr>
    <?php } ?>
  </table>
  <h2>Add New Recofdfdrd</h2>
  <form method="post" action="editfront.php">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>
    <input type="submit" name="add" value="Add">
  </form>
</body>

</html>