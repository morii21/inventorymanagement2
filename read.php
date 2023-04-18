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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Details</title>
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 50%;
            margin: 0 0 0 0;
        }
        p {
            text-indent: 5%;
        }
        hr{
            border-color: #000;
            border-width: 1px;
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
</head>
<body>
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
</body>
</html>