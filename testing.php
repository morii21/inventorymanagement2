<?php
session_start();
?>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

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
          <select id="source" name="dev_mode"
            onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">
            <option value="" disabled selected>Select Development Mode</option>
            <option value="In-house">In-house</option>
            <option value="Outsource">Outsource</option>
          </select>
        </div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="lname">Select Developer...</label>
        </div>
        <div class="col-75">
          <?php
          // Establish database connection
          $conn = mysqli_connect('localhost', 'root', '', 'inventorymanagement');

          // Fetch data from the database
          $sql = "SELECT id, name FROM frontend";
          $result = mysqli_query($conn, $sql);

          // Create dropdown checkbox form
          echo '<form>';

          echo '<select name="skills" id="skills" class="form-control selectpicker" data-live-search="true" multiple>';

          // Populate the dropdown checkbox list with data
          foreach ($result as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
          }

          echo '</select>';
          echo '</form>';
          ?>
        </div>
      </div>

      <script>

    $(document).ready(function(){
     $('.selectpicker').selectpicker();
     
     $('#skills').change(function(){
      $('#hidden_skills').val($('#skills').val());
     });
     
     $('#multiple_select_form').on('submit', function(event){
      event.preventDefault();
      if($('#skills').val() != '')
      {
       var form_data = $(this).serialize();
       $.ajax({
        url:"insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
         //console.log(data);
         $('#hidden_skills').val('');
         $('.selectpicker').selectpicker('val', '');
         alert(data);
        }
       })
      }
      else
      {
       alert("Please select framework");
       return false;
      }
     });
    });
    </script>
      <!-- MULTIPLE SELECTION START -->

      <div class="row">
        <div class="col-25">
          <label for="lname">Front-end</label>
        </div>
        <div class="col-75">

          <div class="selectBox" onclick="showCheckboxes()">
            <select>
              <option value="" disabled selected>Select Front-end upto 5 tags..</option>
            </select>
            <div class="overSelect"></div>
          </div>
          <div id="checkboxes">
            <label for="PHP">
              <input type="checkbox" name="frontend[]" id="PHP" value="PHP" />PHP</label>
            <label for="Python">
              <input type="checkbox" name="frontend[]" id="Python" value="Python" />Python</label>
            <label for="Java">
              <input type="checkbox" name="frontend[]" id="Java" value="Java" />Java</label>
            <label for=".Net">
              <input type="checkbox" name="frontend[]" id=".Net" value=".Net" />.Net</label>
            <label for="MS SQL">
              <input type="checkbox" name="frontend[]" id="MS SQL" value="MS SQL" />MS SQL</label>
            <label for="Ruby">
              <input type="checkbox" name="frontend[]" id="Ruby" value="Ruby" />Ruby</label>
          </div>
          <script>
            var expanded = false;

            function showCheckboxes() {
              var checkboxes = document.getElementById("checkboxes");
              if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
              } else {
                checkboxes.style.display = "none";
                expanded = false;
              }
            }
          </script>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Back-end</label>
        </div>
        <div class="col-75">
          <div class="selectBox" onclick="showCheckboxes1()">
            <select>
              <option disabled selected>Select back-end upto 5 tags..</option>
            </select>
            <div class="overSelect"></div>
          </div>
          <div id="checkboxes1">
            <label for="MySQL">
              <input type="checkbox" name="backend[]" id="MySQL" value="MySQL" />PHP</label>
            <label for="Firebase">
              <input type="checkbox" name="backend[]" id="Firebase" value="Firebase" />Firebase</label>
            <label for="Mariadb">
              <input type="checkbox" name="backend[]" id="Mariadb" value="Mariadb" />Mariadb</label>
            <label for="JavaScript">
              <input type="checkbox" name="backend[]" id="JavaScript" value="JavaScript" />JavaScript</label>
            <label for="C#">
              <input type="checkbox" name="backend[]" id="C#" value="C#" />C#</label>
            <label for="Ruby1">
              <input type="checkbox" name="backend[]" id="Ruby1" value="Ruby" />Ruby</label>
          </div>
          <script>
            var expanded = false;

            function showCheckboxes1() {
              var checkboxes = document.getElementById("checkboxes1");
              if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
              } else {
                checkboxes.style.display = "none";
                expanded = false;
              }
            }
          </script>
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
            $result = mysqli_query($conn, "SELECT id, stat FROM options");
            while ($row = mysqli_fetch_assoc($result)) {
              // Display each option in the dropdown list
              echo "<option value='{$row['id']}'>{$row['stat']}</option>";
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
    select{
    width: 60.6em;
  }
</style>

</html>
