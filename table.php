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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">  
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">  
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <!-- <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/...." alt="logo"></a> INSERT LOGO HERE IF NEEDED
                </div>
            </div> -->
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                
                            </li>
                            <li class="active">
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Item Records</span></a>
                               
                            </li>
                            <li>
                                <a href="table.php" aria-expanded="true"><i class="bi bi-gear"></i>
                                    <span>Management</span></a>
                                    <ul class="collapse">
                                    <li><a href="editdevmode.php">Edit DevMode</a></li>
                                    <li><a href="editdeveloper.php">Edit Developer</a></li>
                                    <li><a href="editfront.php">Edit Frontend</a></li>
                                    <li><a href="editbackend.php">Edit Backend</a></li>
                                    <li><a href="editstatus.php">Edit Status</a></li>
                                </ul>
                            </li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->


        
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                                
                            </form>
                        </div>
                    </div>
                    
                    <!-- profile info & task notification-->
                    <div class="col-md-6 col-sm-4 clearfix">
                        
                    </div>
                </div>
            </div>
            
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <br>
                            <h4 class="page-title pull-left">Table Management</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Item Records</span></li>
                            </ul>
                        </div>
                        <a href="addproject.php" class="button-submit">Add Project</a>
                        <br><br>
                    </div>

                </div>
            </div>
            <!-- page title area end -->
            <div style="background-color: transparent;">

            <div class="main-content-inner">
                <div class="row">
                    <!-- Contextual Classes start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Products</h4>
                                <div class="single-table" style="border-top: 0.5px solid black">
                                    <div class="table-responsive">
                                        <table class="table text-dark text-center">
                                            <thead class="text-uppercase">
                                                <tr class="table-active">
                                                    <!-- <th scope="col">ID</th> THIS IS ID -->

                                                   
                                                    <?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'inventorymanagement');

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('status');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// Get the result...
if ($result = $mysqli->query('SELECT * FROM products  WHERE IsDeleted = 0 ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			
		</head>
		<body>
			<table >
                
				<tr >
                    <th scope="col">L Name</th>
                    <th scope="col">S Name</th>
                    <th scope="col">Details</th>
                    <th style="size =55px" scope="col">Implementing Office</th>                          
					<th><a style="font-size: 100%; color: black; text-decoration: none; text-align: center;"href="table.php?column=status&order=<?php echo $asc_or_desc; ?>">Status<i class="fas fa-sort<?php echo $column == 'status' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th scope="col">Action</th>
                </tr>
				
                
                
                <?php while ($row = $result->fetch_assoc()): ?>
				<tr>
                <td><?php echo $row["product_name"] ?></td>
                      <td ><?php echo $row["product_sname"] ?></td>
                      <td><?php echo $row["details"]  ?></th>
                      <td><?php echo $row["implementing_office"]  ?></td>
					  <td style="background-color: white;"<?php echo $column == 'status' ? $add_class : ''; ?>><?php echo $row['status']; ?></td>
                      <td> <a href="up"Edit</a><a style="color: black; " href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a> <a href="up"Edit</a><a onclick='javascipt:confirmationDelete($(this));return false;' style="color: black;" href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a><a style="color: black;" href="read.php?id=<?php echo $row["product_id"] ?>"> View</a></td>
                    
				</tr>
				<?php endwhile; ?>
                
			</table>
		</body>
	</html>
	<?php
	$result->free();
}
?>

                    <!-- Contextual Classes end -->
                   
        <!-- main content area end -->
      
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>


<script>

    function confirmationDelete(anchor){
        var conf = confirm('Are you sure you want to delete this project?');
            if(conf)
                window.location=anchor.attr("href");
    }


</script>


</html>
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
   
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
			}
			table {
				width: 100%;
			}
			th {
				background-color: white;    
				border: 1px solid black;
                text-align: center;
                padding: .1px;
                background-color: #D8D8D8;
			}
			
			th a {
				display: block;
				text-decoration:none;
				padding: 30px;
				color: #;
				font-weight: bold;
				font-size: 13px;
                
			}
			th a i {
				margin-left: 15px;
				color: # rgba(255,255,255,0.4);
                
			}
			td {
				padding: 40px;
				color: black;
                border: 0.5px solid black;
                        
            
			}
			tr {
				background-color: #ffffff;
                /* border border-top: 1px solid black; */
			}
			tr .highlight {
				background-color: #f9fafb;
			}
			</style>
<style>
    .card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 200%;
  word-wrap: break-word;
  background-color: lightgray;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.button-submit {
      display: inline-block;
      background: #599B87;
      color: #fff;
      margin-bottom: 5px;
      width: auto;
      padding: 10px 39px;
      border-radius: 55px;
      -moz-border-radius: 5px;
      -webkit-border-radius: 55px;
      -o-border-radius: 5px;
      -ms-border-radius: 5px;
      margin-top: 15px;
      text-decoration: none;    
      cursor: pointer; }
      .button-submit:hover {
        background: #3C685A;
        text-decoration: none;
        color: #fff; }
</style>
</html>