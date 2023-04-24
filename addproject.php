<?php
session_start();
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script language="javascript" type="text/javascript" name="developer">
    function dynamicdropdown(listindex) {
      switch (listindex) {
        case "In-house":
          document.getElementById("developer").options[0] = new Option("Select Developer", "");
          document.getElementById("developer").options[1] = new Option("Jazmine", "Jazmine");
          document.getElementById("developer").options[2] = new Option("Edlar", "Edlar");
          break;
        case "Outsource":
          document.getElementById("developer").options[0] = new Option("Select Developer", "");
          document.getElementById("developer").options[1] = new Option("John Christian", "John Christian");
          document.getElementById("developer").options[2] = new Option("Nicole", "Nicole");
          document.getElementById("developer").options[3] = new Option("Angelika", "Angelika");
          break;
      }
      return true;
    }
  </script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
</head>

<h1 style="text-align:center">Add Item Here</h1>
<div class="container1">

  <body>
    <form method="POST" action="additem.php">
      <div class="row">
        <div class="col-25">
          <label for="fname">IS Long Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="product_name" placeholder="Long Name...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">IS Short Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="product_sname" placeholder="Short Name..">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">IS Description</label>
        </div>
        <div class="col-75">
          <input type="text" name="details" placeholder="Description...">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">IS Implementing Office</label>
        </div>
        <div class="col-75">
          <input type="text" name="implementing_office" placeholder="Implementing Office..">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Select Development Mode</label>
        </div>
        <div class="col-75">

          <select name="dev_mode" id="main_category">

            <?php
            // Connect to database
            $conn = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
            if (!$conn) {
              die('Could not connect: ' . mysqli_error());
            }
            // Query main category table and generate options
            $query = "SELECT * FROM categories";
            $result = mysqli_query($conn, $query);
            $options = '<option value="">Select Category</option>';
            while ($row = mysqli_fetch_assoc($result)) {
              $options .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            echo $options;
            mysqli_close($conn);
            ?>
          </select>

        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="lname">Select Developer...</label>
        </div>
        <div class="col-75">

          <select name="developer" id="sub_category">
            <option value="" disabled selected>Select a subcategory</option>
          </select>
          <script>
            $(document).ready(function () {
              $('#main_category').change(function () {
                var mainCategoryId = $(this).val();
                $.ajax({
                  type: 'POST',
                  url: 'get_subcategory.php',
                  data: { 'category_id': mainCategoryId },
                  success: function (response) {
                    $('#sub_category').html(response);
                  }
                });
              });
            });
          </script>

        </div>
      </div>

      <!-- MULTIPLE SELECTION START -->

      <div class="row">
        <div class="col-25">
          <label for="lname">Front-end</label>
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
          <label for="lname">Back-end</label>
        </div>
        <div class="col-75">

          <select name="backend[]" id="skills" class="form-control selectpicker" data-live-search="true" multiple
            multiple title="Select Back-End...">
            <?php
            // Connect to MySQL database
            $conn = mysqli_connect("localhost", "root", "", "inventorymanagement");

            // Retrieve options from database
            $result = mysqli_query($conn, "SELECT id, name FROM backend");
            while ($row = mysqli_fetch_assoc($result)) {
              // Display each option in the dropdown list
              echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
            }

            ?>
          </select>

        </div>
      </div>
      <!-- MULTIPLE SELECTION END -->
      <div class="row">
        <div class="col-25">
          <label for="country">IS Status</label>
        </div>
        <div class="col-75">
          <select name="status">
            <option disabled selected>Select Status...</option>
            <?php
            // Connect to MySQL database
            $conn = mysqli_connect("localhost", "root", "", "inventorymanagement");

            // Retrieve options from database
            $result = mysqli_query($conn, "SELECT id, name FROM options");
            while ($row = mysqli_fetch_assoc($result)) {
              // Display each option in the dropdown list
              echo "<option value='{$row['name']}'>{$row['name']}</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="subject">Remarks</label>
        </div>
        <div class="col-75">
          <textarea name="remarks" placeholder="Write something.." style="height:100px"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Server Host ID</label>
        </div>
        <div class="col-75">
          <input type="text" name="serverhid" placeholder="Server Host ID...">
        </div>
      </div>
      <div class="row">

        <button type="submit" class="button-submit" name="add">Add item</button>

        <button type="button" class="button-submit" onclick="window.history.back();">Cancel</button>

    </form>
  </body>
</div>
<html>

<head>
  <title>Add Item</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
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
    font-size: 18px
  }

  .col-75 {
    float: left;
    width: 65%;
    margin-top: 6px;
    font-size: 16px
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

  .bootstrap-select>.btn {
    font-size: 16px;
    /* Replace with your desired font size */
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;

  }

  .bootstrap-select>.dropdown-menu li a {
    font-size: 16px;

  }
</style>

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