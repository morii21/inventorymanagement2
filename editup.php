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
$remarks   = "";
$serverhid   = "";

  include('config.php');

  if (isset($_POST['submit']))
  {
  $id=$_POST['id'];
  $product_name=mysqli_real_escape_string($db, $_POST['product_name']);
  $product_sname=mysqli_real_escape_string($db, $_POST['product_sname']);
  $details=mysqli_real_escape_string($db, $_POST['details']);
  $implementing_office=mysqli_real_escape_string($db, $_POST['implementing_office']);
  $dev_mode=mysqli_real_escape_string($db, $_POST['dev_mode']);
  $developer=mysqli_real_escape_string($db, $_POST['developer']);
  $frontend=mysqli_real_escape_string($db, $_POST['frontend']);
  $backend=mysqli_real_escape_string($db, $_POST['backend']);
  $status=mysqli_real_escape_string($db, $_POST['status']);
  $remarks=mysqli_real_escape_string($db, $_POST['remarks']);
  $serverhid=mysqli_real_escape_string($db, $_POST['serverhid']);
  
  mysqli_query($db,"UPDATE products SET product_name='$product_name', product_sname='$product_sname' ,details='$details', implementing_office='$implementing_office', dev_mode='$dev_mode',developer='$developer',frontend='$frontend',backend='$backend',status='$status',remarks='$remarks',serverhid='$serverhid'
  WHERE product_id='$id'");
  
  header("Location:table.php");
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
  $developer=$row['developer'];
  $front=$row['frontend'];
  $frontstr= implode(",",$front);
  $back=$row['backend'];
  $backstr= implode(",",$back);

  $status=$row['status'];
  $remarks=$row['remarks'];
  $serverhid=$row['serverhid'];

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

<!-- <body> -->

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
            
            <div class="main-content-inner">
                <div class="row">
            <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                
                
                <h1 style="text-align:center">Edit Project</h1></b>
<body>
<form method="post" action="edit.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div class="container1">  
<body>
    <div class="row">
        <div class="col-25">
            <label> <td width="179"><font size="4"  color='#663300' >IS Long Name<em>*</em></font></td></label>
        </div>  
        <div class="col-75">
            <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid;" type="text" name="product_name" size="80" value="<?php echo $product_name; ?>" />
        </div>
    </div>

<div class="row">
    <div class="col-25">
        <label><td width="179"><font size="4" color='#663300'>IS Short Name<em>*</em></font></td></label>
    </div> 
    <div class="col-75">     
        <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid;" type="text" name="product_sname" size="80" value="<?php echo $product_sname ?>" />
    </div>
</div>


<div class="row">
    <div class="col-25">
         <label><td width="179"><font size="4" color='#663300'>IS Description<em>*</em></font></label>
    </div> 
    <div class="col-75">    
        <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid" type="text" name="details" size="80" value="<?php echo $details ?>" />
    </div>
</div>


<div class="row">
    <div class="col-25">
         <label><td width="179"><font size="4"color='#663300'>IS Implementing Office<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
        <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid" type="text" name="implementing_office" size="80" value="<?php echo $implementing_office;?>" />
    </div>
</div>

<div class="row">
    <div class="col-25">
         <label><td width="179"><font size="4"color='#663300'>IS Development Mode<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
        <!-- <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid" type="text" name="dev_mode" size="80" value="<?php echo $dev_mode;?>" /> -->
        <select id="category" name="dev_mode">
            
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
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
              }
            } else {
              echo "<option value=''>No categories found</option>";
            }

            $conn->close();
            ?>
          </select>
    </div>
</div>

<div class="row">
    <div class="col-25">
        <label><td width="179"><font size="4" color='#663300'>IS Developer<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
     <!-- <input style="font-size:19px; border-radius: 4px; height: 70%;border: 1px solid" type="text" name="developer" size="80" value="<?php echo $developer;?>" /> -->
 <select id="subcategory" name="dev_mode">
            <option value="">Select Subcategory</option> 
          </select>
          <script>
            $(document).ready(function () {
              $("#category").change(function () {
                var category = $("#category").val();
                if (category) {
                  $.ajax({
                    type: 'GET',
                    url: 'getSubcategories.php',
                    data: { category: category },
                    success: function (response) {
                      $("#subcategory").html(response);
                    },
                    error: function (xhr, status, error) {
                      console.log("An error occurred while fetching subcategories: " + error);
                    }
                  });
                }
                else {
                  $("#subcategory").html('<option value="">Select Category first</option>');
                }
              });
            });
          </script>
        
     </div>
</div>

<div class="row">
    <div class="col-25">
        <label><td width="179"><font size="4" color='#663300'>Front-End<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
     
    <select name="frontend[]" id="skills" class="form-control selectpicker" data-live-search="true" multiple
            multiple title="Select Front-End...">
            <?php
            // Connect to MySQL database
            $conn = mysqli_connect("localhost", "root", "", "inventorymanagement");

            // Retrieve options from database
            $result = mysqli_query($conn, "SELECT id, name FROM frontend");
            while ($row = mysqli_fetch_assoc($result)) {
              // Display each option in the dropdown list
              echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
            }



            ?>
          </select>
     </div>
</div>

<div class="row">
    <div class="col-25">
        <label><td width="179"><font size="4" color='#663300'>Back-End<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
     <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid" type="text" name="backend" size="80"  value="<?php echo $backend;?>" />
     </div>
</div>

<div class="row">
    <div class="col-25">
        <label><td width="179"><font size="4" color='#663300'>IS Status<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
     <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid" type="text" name="status" size="80"  value="<?php echo $status;?>" />
     </div>
</div>

<div class="row">
    <div class="col-25">
        <label><td width="179"><font size="4" color='#663300'>Remarks<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
     <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid" type="text" name="remarks" size="80"  value="<?php echo $remarks;?>" />
     </div>
</div>

<div class="row">
    <div class="col-25">
        <label><td width="179"><font size="4" color='#663300'>Server Host ID<em>*</em></font></td></label>
    </div>  
    <div class="col-75">    
     <input style="font-size:19px;border-radius: 4px; height: 70%;border: 1px solid" type="text" name="serverhid" size="80 "  value="<?php echo $implementing_office;?>" />
     </div>
</div>

<button type="button" class="button-submit" onclick="window.history.back();">Cancel</button>
<button type="submit"  class="button-submit" name="submit">Edit Records</button>
</label>
</form>
</body>

            
                    
                    <!-- Contextual Classes end -->
                   
        <!-- main content area end -->
      
<html>
<head>
	<title>Add Item</title>
	<!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

</html>
       
<style>
    * {
  box-sizing: border-box;
}
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
      border: none;
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

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 19px;
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
  padding: 19px;
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

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: "100%;
    margin-top: 0;
  }
}
</style>
</html>
</div>

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