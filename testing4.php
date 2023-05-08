<?php // Start the session
session_start();

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "inventorymanagement";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



// Handle user addition
if (isset($_POST["add_user"])) {
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  
  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  // Insert the new user into the database
  $sql =   "INSERT INTO register (username,email,password_1,first_name,last_name,mobile,role) 
  VALUES('$username', '$email', '$password','$first_name','$last_name','$mobile','$role')";
mysqli_query($db, $query);
$_SESSION['username'] = $username;
$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
  
 

  // Redirect the user to the user management page
  header("Location: testing4.php");
  exit;
}

// Handle user deletion
if (isset($_POST["delete_user"])) {
  $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
  
  // Delete the user from the database
  $sql = "DELETE FROM register WHERE id = '$user_id'";
  mysqli_query($conn, $sql);
  
  // Redirect the user to the user management page
  header("Location: testing4.php");
  exit;
}

// Handle user edition
if (isset($_POST["edit_user"])) {
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  
  
  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  // Update the user in the database
  // $sql = "UPDATE register SET username = '$username', password = '$hashed_password', email = '$email', role = '$role' WHERE id = '$user_id'";
  // mysqli_query($conn, $sql);

    $sql = "UPDATE register SET first_name = '$first_name', last_name = '$last_name', username = '$username', email = '$email', password_1 = '$password', mobile = '$mobile', role = '$role' WHERE id = '$user_id'";
  mysqli_query($conn, $sql);
  
  // Redirect the user to the user management page
  header("Location: testing4.php");
  exit;
}

// Query the users from the database
$sql = "SELECT id, username, email, password_1, first_name, last_name, mobile, role FROM register";
$result = mysqli_query($conn, $sql);


  echo "<table>";
  echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>";
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['username']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['role']."</td>";
      if($row['role'] === 'admin') {
          echo "<td></td>";
      } else {
          echo "<td><form method='POST' action='edit_user.php'><input type='hidden' name='id' value='".$row['id']."'><button type='submit'>Edit</button></form><form method='POST' action='delete_user.php'><input type='hidden' name='id' value='".$row['id']."'><button type='submit'>Delete</button></form></td>";
      }
      echo "</tr>";
  }
  echo "</table>";
  
  // Display a form to add a new user
  echo "<h2>Add User</h2>";
  echo "<form method='POST'>";
  echo "<label for='username'>username:</label>";
  echo "<input type='text' name='username'>";
  echo "<label for='email'>Email:</label>";
  echo "<input type='email' name='email'>";
  echo "<label for='password'>Password:</label>";
  echo "<input type='password' name='password_1'>";
  echo "<label for='role'>Role:</label>";
  echo "<select name='role'>";
  echo "<option value='user'>User</option>";
  echo "<option value='admin'>Admin</option>";
  echo "</select>";
  echo "<button type='submit' name='add_user'>Add User</button>";
  echo "</form>";
  
  // Close the database connection
  $conn->close();
  ?>