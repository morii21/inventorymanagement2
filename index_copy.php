<?php 

// initializing variables
$product_name = "";
$product_sname = "";
$details     = "";
$implementing_office   = "";
$dev_mode   = "";
$developer   = "";
$frontend   = "";
$backend   = "";
$status   = "";

  include('config.php');

  if (isset($_POST['submit']))
  {
  $id=$_POST['id'];
  $product_name=mysqli_real_escape_string($db, $_POST['product_name']);
  $product_sname=mysqli_real_escape_string($db, $_POST['product_sname']);
  $details=mysqli_real_escape_string($db, $_POST['details']);
  $implementing_office=mysqli_real_escape_string($db, $_POST['implementing_office']);
  $dev_mode=mysqli_real_escape_string($db, $_POST['dev_mode']);
  mysqli_query($db,"UPDATE products SET product_name='$product_name', product_sname='$product_sname' ,details='$details', implementing_office='$implementing_office', 
  dev_mode='$dev_mode'
  WHERE product_id='$id'");
  
  header("Location:index_copy.php");
  }
  
  
  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
  {
  
  $id = $_GET['id'];
  $result = mysqli_query($db,"SELECT * FROM products WHERE product_id=".$_GET['id']);
  
  $row = mysqli_fetch_array($result);
  
  if($row)
  {
  
  $id = $row['product_id'];
  $product_name = $row['product_name'];
  $product_sname = $row['product_sname'];
  $details=$row['details'];
  $implementing_office=$row['implementing_office'];
  $dev_mode=$row['dev_mode'];
  }
  else
  {
  echo "No results!";
  }
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

<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>

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
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Item Records</span></li>
                            </ul>
                        </div>
                      <!--  <a href="addproject.php" class="button-submit">Add Project</a> -->
                    </div>
       
                </div>
            </div>
            <!-- page title area end -->
            
            <select multiple>
  <option value="option1">Option 1</option>
  <option value="option2">Option 2</option>
  <option value="option3">Option 3</option>
  <option value="option4">Option 4</option>
</select>
            
                    
                    <!-- Contextual Classes end -->
                   
        <!-- main content area end -->
      
<html>
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

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
    .card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 200%;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.button-submit {
      display: inline-block;
      background: #599B87;
      color: #fff;
      border-bottom: none;
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
    }

input[type=text], select, textarea {
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
}

.col-75 {
  float: left;
  width: 65%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
select {
  width: 200px;
  height: 30px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
  background-color: #fff;
  font-size: 14px;
  color: #444;
  cursor: pointer;
}

select option {
  padding: 5px;
}

select option:hover {
  background-color: #f5f5f5;
}

select option:checked {
  background-color: #ddd;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</html>
