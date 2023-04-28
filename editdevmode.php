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



              <li>
                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                  <span>Item Records</span></a>

              </li>
              <li>
                <a href="table.php" aria-expanded="true"><i class="bi bi-gear"></i>
                  <span>Management</span></a>
                <ul class="collapse">

                  <li class="active"><a href="editdevmode.php"> DevMode</a></li>
                  <li><a href="editdeveloper.php"> Developer</a></li>
                  <li><a href="editfront.php"> Frontend</a></li>
                  <li><a href="editbackend.php"> Backend</a></li>
                  <li><a href="editstatus.php"> Status</a></li>
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
              <h4 class="page-title pull-left">Dashboard</h4>
              <ul class="breadcrumbs pull-left">
                <li><a href="index.php">Home</a></li>
                <li><span>Management</span></li>
              </ul>
            </div>
         
          </div>
         

        </div>
      </div>
      <!-- page title area end -->
      <div>

      
        <div class="main-content-inner">
          <div class="row">

            <!-- Contextual Classes start -->
            <div class="col-lg-6 mt-5">
              <div class="card">
                <div class="card-body">

                  <div class="single-table">
                    <div class="table-responsive">


                  

                      <h1 style="text-align:center">Management Edit</h1>
                      <div class="container1">

                        <body>
                          <?php
                          // Database connection
                          $dbhost = "localhost";
                          $dbuser = "root";
                          $dbpass = "";
                          $dbname = "inventorymanagement";
                          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                          // Add function
                          if (isset($_POST['add'])) {
                            $name = $_POST['name'];
                            $sql = "INSERT INTO categories (name) VALUES ('$name')";
                            if (mysqli_query($conn, $sql)) {
                              echo "Record added successfully.";
                            } else {
                              echo "Error: " . mysqli_error($conn);
                            }
                          }

                          // Delete function
                          if (isset($_GET['delete'])) {
                            $id = $_GET['delete'];
                            $sql = "DELETE FROM categories WHERE id=$id";
                            mysqli_query($conn, $sql);
                          }

                          // Edit function
                          if (isset($_POST['edit'])) {
                            $id = $_POST['id'];
                            $name = $_POST['name'];
                            $sql = "UPDATE categories SET name='$name' WHERE id=$id";
                            mysqli_query($conn, $sql);
                          }

                          // Retrieve data
                          $sql = "SELECT * FROM categories";
                          $result = mysqli_query($conn, $sql);

                          ?>
                          <!DOCTYPE html>
                          <html>

                          <head>
                            <title>Devmode Management Table</title>
                          </head>

                          <body>
                            <div class="container">
                              <div class="form-container">
                                <h2>Devmode Table</h2>
                                <table>
                                  <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                  </tr>
                                  <?php while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                      <td>
                                        <?php echo $row['name']; ?>
                                      </td>
                                      <td>
                                        <a href="editdevmode.php?delete=<?php echo $row['id']; ?>"
                                          onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                        <a href="editconfig_devmode.php?id=<?php echo $row['id']; ?>">Edit</a>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                </table>
                              </div>

                              <div class="result-container">
                                <h2>Add New Record to 'Devmode'</h2>
                                <form method="post" action="editdevmode.php">
                                  <label>Name:</label>
                                  <input type="text" name="name" required><br><br>
                                  <input type="submit" name="add" value="Add">
                                </form>
                          </body>
                      </div>
                    </div>

</html>



</body>
</div>
<html>

<head>
  <title>Add Item</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

</div>
</div>
</div>
</div>
<div>


</div>
</div>
<!-- Contextual Classes end -->

<!-- main content area end -->

<html>

<head>
  <title>Add Item</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
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
  th {
    background-color: white;
    border: 1px solid black;
    text-align: center;
    padding: .1px;
    background-color: #D8D8D8;
  }

  td {
    padding: 5px;
    color: black;
    border: 0.5px solid black;


  }

  h2 {
    margin-bottom: 40px;
    /* Adds a 50px margin below the h1 element */
  }

  .container {
    display: flex;
    flex-wrap: wrap;
  }

  .form-container {
    flex: 1;
    padding: 10px;
    box-sizing: border-box;
    border: 3px solid #ccc;
 
  }

  .result-container {
    flex: 1;
    padding: 10px;
    box-sizing: border-box;
    background-color: #f2f2f2;
    border: 3px solid #ccc;
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
      width: 60%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      left: -40px;
    }


    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 10px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
      position: relative;
      left: -60px;
      top: -70px;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container1 {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
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
      cursor: pointer;
    }

    .button-submit:hover {
      background: #3C685A;
      text-decoration: none;
      color: #fff;
    }
</style>

</html>