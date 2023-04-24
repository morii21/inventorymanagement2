<?php
// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

if (isset($_POST['submit'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $subcategory_name = mysqli_real_escape_string($conn, $_POST['subcategory_name']);

    // Check if the subcategory already exists in the database
    $query = "SELECT * FROM subcategories WHERE name = '".$subcategory_name."' AND category_id = '".$category_id."'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Subcategory already exists!";
    } else {
        // Insert the new subcategory into the database
        $query = "INSERT INTO subcategories (name, category_id) VALUES ('".$subcategory_name."', '".$category_id."')";
        if (mysqli_query($conn, $query)) {
            echo "Subcategory added successfully!";
        } else {
            echo "Error adding subcategory: " . mysqli_error($conn);
        }
    }
}
?>

<form method="POST">
    <label for="category">Select a category:</label>
    <select id="category" name="category_id">
        <?php
        // Generate options for category dropdown list
        $query = "SELECT * FROM categories";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
        ?>
    </select>

    <label for="subcategory">Subcategory name:</label>
    <input type="text" id="subcategory" name="subcategory_name">

    <input type="submit" name="submit" value="Add">
</form>
