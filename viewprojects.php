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



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<!-- Contextual Classes start -->
                    <!-- <div class="col-lg-6 mt-5"> -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Project </h4>
                                <button type="button" class="btn btn-primary" onclick="window.history.back();">Back</button>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-dark text-center">
                                            <thead class="text-uppercase">
                                                <tr class="table-active">
                                                    <!-- <th scope="col">ID</th> -->
                                                    <th scope="col">L Name</th>
                                                    <th scope="col">S Name</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col">Implementing Office</th>
                                                    <th scope="col">Development Mode</th>
                                                    <th scope="col">IS Developer</th>        
                                                    <th scope="col">Front-end</th>
                                                    <th scope="col">Back-end</th>    
                                                    <th scope="col">IS Status</th>        
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col">Server Host ID</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
			<?php 
               $conn = new mysqli("localhost","root","","inventorymanagement");
               $sql = "SELECT * FROM products";
               $result = $conn->query($sql);
					$count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {
					  $count=$count+1;
                   ?>
                   <tr>
                    <!-- <th><?php echo $count ?></th> -->
                      <th><?php echo $row["product_name"] ?></th>
                      <th><?php echo $row["product_sname"] ?></th>
                      <th><?php echo $row["details"]  ?></th>
                      <th><?php echo $row["implementing_office"]  ?></th>
                      <th><?php echo $row["dev_mode"]  ?></th>
                      <th><?php echo $row["developer"]  ?></th>
                      <th><?php echo $row["frontend"]  ?></th>
                      <th><?php echo $row["backend"]  ?></th>
                      <th><?php echo $row["status"]  ?></th>
                      <th><?php echo $row["remarks"]  ?></th>
                      <th><?php echo $row["serverhid"]  ?></th>
					   </tr>
            <?php
                 
                 }
               }

            ?>
<html>
<head>
	<title>View Project</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>


</html>