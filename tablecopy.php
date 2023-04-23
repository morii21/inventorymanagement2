<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM products WHERE product_id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the
result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $product_name = $row["product_name"];
                $product_sname = $row["product_sname"];
                $details = $row["details"];
                $implementing_office = $row["implementing_office"];
                $dev_mode = $row["dev_mode"];
                $developer = $row["developer"];
                $frontend = $row["frontend"];
                $backend = $row["backend"];
                $status = $row["status"];
                $remarks = $row["remarks"];
                $serverhid = $row["serverhid"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to

                header("location: error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
?>

    <!-- logged in user information -->
   
</div>
<script>src="srtdash/assets/js/vendor/jquery-2.2.4.min.js" </script>
<script>src="srtdash/assets/js/vendor/modernizr-2.8.3.min.js" </script>
</body>
<style>
body {
  background-image: url('image1.jpg');
}
</style>
</html>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
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
                    <a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div> -->
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="index.php" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>

                            <li>
                                <a href="table.php" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Item Records</span></a>
                               <!-- <ul class="collapse">
                                    <li><a href="table-basic.html">basic table</a></li>
                                    <li><a href="table-layout.html">table layout</a></li>
                                    <li><a href="datatable.html">datatable</a></li>
                                </ul>
								! -->
                            </li>
                            <li>
                                <a href="management.php" aria-expanded="true"><i class="bi bi-gear"></i>
                                    <span>Management</span></a> </li>
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
                            <!-- <img src="image1.jpg" alt="welcome" style="width:100%"> -->
                            <form action="#">
                                <input type="text" name="search" placeholder="Search Project..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                           
                            
        
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->

            <!-- page title area end -->
          <div>
		
          <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Long Name:</label>
                        <p><b><?php echo $row["product_name"]; ?></b></p>
                        <hr>
                    </div>

                    <div class="form-group">
                        <label>Short Name:</label>
                        <p><b><?php echo $row["product_sname"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Details:</label>
                        <p><b><?php echo $row["details"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Implementing Office:</label>
                        <p><b><?php echo $row["implementing_office"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Development Mode:</label>
                        <p><b><?php echo $row["dev_mode"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Developer:</label>
                        <p><b><?php echo $row["developer"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Front-end:</label>
                        <p><b><?php echo $row["frontend"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Back-end:</label>
                        <p><b><?php echo $row["backend"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <p><b><?php echo $row["status"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Remarks:</label>
                        <p><b><?php echo $row["remarks"]; ?></b></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Server Host ID:</label>
                        <p><b><?php echo $row["serverhid"]; ?></b></p>
                        <hr>
                    </div>
                    <a href="table.php" class="button-submit">Back</a>
                </div>
            </div>
        </div>
    </div>
		
        <!-- main content area end -->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        
           
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

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
