<?php
if(isset($_GET['category'])){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "inventorymanagement";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $category = $_GET['category'];
  $sql = "SELECT id FROM categories WHERE name = '".$category."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $category_id = $row['id'];

    $sql = "SELECT name FROM subcategories WHERE category_id = '".$category_id."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row['name']."'>".$row['name']."</option>";
      }
    }
    else {
      echo "<option value=''>No subcategories found</option>";
    }
  }
  else {
    echo "<option value=''>Category not found</option>";
  }

  $conn->close();
}
else{
  echo "<option value=''>Select Category first</option>";
}
?>
