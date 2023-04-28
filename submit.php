<?php

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

$category = $_POST['categorySelect'];
$subcategory = $_POST['subcategorySelect'];

$sql = "INSERT INTO submissions (category, subcategory) VALUES ((SELECT id FROM categories WHERE name = '".$category."'), (SELECT id FROM subcategories WHERE name = '".$subcategory."'))";

if ($conn->query($sql) === TRUE