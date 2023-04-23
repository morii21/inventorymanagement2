<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventorymanagement";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<h1 style="text-align:center">Management Edit</h1>
<div class="container1">

  <body>
    <!------------------------------------ Starting 'ADD' Form --------------------------------------------------------------->
    <?php
    // Check if form is submitted
    if (isset($_POST['submit'])) {
      // Get form data
      $name = $_POST['name'];

      // Insert data into database
      $sql = "INSERT INTO frontend (name) VALUES ('$name')";
      if (mysqli_query($conn, $sql)) {
        echo "Record added successfully.";
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
    ?>

    <!-- Add form -->
    <form method="post">
      <label>Name:</label>
      <input type="text" name="name" required>

      <input type="submit" name="submit" value="Add">
    </form>
    <!----------------------------------- Starting 'DELETE' Form -------------------------------------->
    <?php
    // Check if delete button is clicked
    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];

      // Delete record from database
      $sql = "DELETE FROM frontend WHERE id=$id";
      if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully.";
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
    ?>

    <!-- Table -->
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
      <?php
      // Retrieve data from database
      $sql = "SELECT * FROM frontend";
      $result = mysqli_query($conn, $sql);

      // Display data in table
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td><a href='?delete=" . $row['id'] . "'>Delete</a></td>";
        echo "<td><a href='editfront.php?id=" . $row['id'] . "'>Edit</a></td>";
        echo "</tr>";
      }
      ?>

    </table>

    <!------------------------- Starting 'EDIT' Form --------------------------------------->

  </body>
</div>
<html>

<head>
  <title>Add Item</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

<style>
  .multiselect {
    width: 200px;
  }

  .selectBox {
    position: relative;
  }

  .selectBox select {
    width: 100%;
    font-weight: bold;
  }


  .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }

  .overSelect1 {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }


  #checkboxes {
    display: none;
    border: 1px #dadada solid;
  }

  #checkboxes1 {
    display: none;
    border: 1px #dadada solid;
  }


  #checkboxes label {
    display: block;
  }

  #checkboxes1 label {
    display: block;
  }


  #checkboxes label:hover {
    background-color: #1e90ff;
  }

  #checkboxes1 label:hover {
    background-color: #1e910ff;
  }

  input[type=checkbox]:checked+label {
    border: 1px solid red;
  }

  * {
    box-sizing: border-box;
  }

  select:required:invalid {
    color: gray;
  }

  option {
    color: black;
  }

  .button-submit {
    display: inline-block;
    background: #599B87;
    color: #fff;
    border: none;
    width: auto;
    margin: 5px;
    padding: 10px 39px;
    border-radius: 55px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 55px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    margin-top: 15px;
    text-decoration: none;
    cursor: pointer;
  }

  .button-submit:hover {
    background: #3C685A;
    text-decoration: none;
    color: #fff;
  }

  input[type=text],
  select,
  textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }

  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }

  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }

  input[type=submit]:hover {
    background-color: #45a049;
  }

  .container1 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }

  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
    font-size: 18px;
  }

  .col-75 {
    float: left;
    width: 65%;
    margin-top: 6px;
    font-size: 18px
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {

    .col-25,
    .col-75,
    input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }

  select {
    width: 60.6em;
  }
</style>

</html>