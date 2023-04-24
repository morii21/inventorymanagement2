<?php
// Database connection
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'inventorymanagement';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check if the form is submitted
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];


    // Update data in the database
    $sql = "UPDATE categories SET name='$name' WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect to the homepage after editing
    header("Location: editdevmode.php");
    exit();
}

// Retrieve data from the database for the selected row
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    // If no id is provided, redirect to the homepage
    header("Location: editdevmode.php");
    exit();
}
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>

    <input type="submit" name="edit" value="Save">
</form>