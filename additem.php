<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php


// initializing variables
$product_name = "";
$product_sname = "";
$details     = "";
$implementing_office   = "";
$dev_mode   = "";
$developer   = "";
$front   = "";
$frontstr = "";
$backend   = "";
$status   = "";
$remarks   = "";
$serverhid   = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  echo "connect";
  $product_name=mysqli_real_escape_string($db, $_POST['product_name']);
  $product_sname=mysqli_real_escape_string($db, $_POST['product_sname']);
  $details=mysqli_real_escape_string($db, $_POST['details']);
  $implementing_office=mysqli_real_escape_string($db, $_POST['implementing_office']);
  $dev_mode=mysqli_real_escape_string($db, $_POST['dev_mode']);
  $developer=mysqli_real_escape_string($db, $_POST['developer']); 
  $front = $_POST['frontend'];
  $frontstr= implode(",",$front);

  $back = $_POST['backend'];
  $backstr= implode(",",$back);

  $status=mysqli_real_escape_string($db, $_POST['status']);
  $remarks=mysqli_real_escape_string($db, $_POST['remarks']);
  $serverhid=mysqli_real_escape_string($db, $_POST['serverhid']);
  
  

    $query = "INSERT INTO products (product_name,product_sname,details,implementing_office,dev_mode,developer,frontend, backend,status,remarks,serverhid) 
  			  VALUES('$product_name','$product_sname','$details','$implementing_office','$dev_mode','$developer','$frontstr','$backstr','$status','$remarks','$serverhid')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: table.php');
  
}
?>

