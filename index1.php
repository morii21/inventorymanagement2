<!DOCTYPE html>
<html>
<head>
	<title>Linked Dropdown Demo</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<label>Category:</label>
	<select id="category">
		<option value="">Select Category</option>
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

		$sql = "SELECT name FROM categories";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<option value='".$row['name']."'>".$row['name']."</option>";
			}
		}
		else {
			echo "<option value=''>No categories found</option>";
		}

		$conn->close();
		?>
	</select>
	<br><br>
	<label>Subcategory:</label>
	<select id="subcategory">
		<option value="">Select Subcategory</option>
	</select>
	<script>
		$(document).ready(function(){
			$("#category").change(function(){
				var category = $("#category").val();
				if(category){
					$.ajax({
						type: 'GET',
						url: 'getSubcategories.php',
						data: {category: category},
						success: function(response){
							$("#subcategory").html(response);
						},
						error: function(xhr, status, error){
							console.log("An error occurred while fetching subcategories: " + error);
						}
					});
				}
				else{
					$("#subcategory").html('<option value="">Select Category first</option>');
				}
			});
		});
	</script>
</body>
</html>
