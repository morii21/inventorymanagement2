


  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<style type="text/css">  
  select{
    width: 90em;
  }
 </style>

<div class="container-fluid"style="text-align: center;margin-bottom:200px;">
<h1>Demo Multiselect Box In PHP</h1>
<div class="row">
<div class="col-md-12" >

<form id="myForm" method="POST">

<div class="col-md-12" >


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
 </div><div class="col-md-12" style="margin-top:20px;" >
 <input type="submit" value="Submit" ></div>
</form></div></div></div>

<script>
$(document).ready(function() {       
	$('#current_select').multiselect({		
		nonSelectedText: 'Select Current values'				
	});
});

$(function () {

 
 $('#current_select').multiselect({ 
 buttonText: function(options, select) {
 var labels = [];
 console.log(options);
 options.each(function() {
 labels.push($(this).val());
 });
 $("#current_select_values").val(labels.join(',') + '');
 return labels.join(', ') + '';
 //}
 }
 
 });
});
</script>

<?php print_r ($_POST['current_select']); ?>