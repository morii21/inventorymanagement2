<?php
// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

// Get main category ID from POST data
$categoryId = $_POST['category_id'];
$output='';

// Query subcategory table based on main category ID and generate options
$query = "SELECT subcategories.id, subcategories.name FROM subcategories 
          INNER JOIN categories ON subcategories.category_id = categories.id 
          WHERE categories.id = '".$categoryId."'";
$result = mysqli_query($conn, $query);
$output .='<option value="" disabled selected>Select a subcategory</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $output .=  "<option value='".$row['name']."'>".$row['name']."</option>";
}
echo $output;
?>
