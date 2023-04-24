<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventorymanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$new_subcategory = $_POST['new_subcategory'];
$category_id = $_POST['category_id'];

$sql = "INSERT INTO subcategories (name, category_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $new_subcategory, $category_id);
$stmt->execute();

$sql = "SELECT * FROM subcategories WHERE category_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<option value=''>Select Subcategory</option>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}

$stmt->close();
$conn->close();
?>
