
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>multiselect</title>
    <script type="text/javascript" src="multiselect-dropdown.js"></script>
      <style type="text/css">
          select{
            width: 30em;
        }
    </style>
</head> 
<body>
<form action="" method="post">
  <select name="dropdown" onclick="showCheckboxes(this)">
    <option value="">Select an option</option>
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
  </select>
  
  <div id="checkboxes" style="display:none;">
    <label><input type="checkbox" name="checkbox[]" value="checkbox1">Checkbox 1</label>
    <label><input type="checkbox" name="checkbox[]" value="checkbox2">Checkbox 2</label>
    <label><input type="checkbox" name="checkbox[]" value="checkbox3">Checkbox 3</label>
  </div>
  
  <input type="submit" value="Submit">
</form>

<script>
function showCheckboxes(dropdown) {
  var checkboxes = document.getElementById("checkboxes");
  if (dropdown.value === "") {
    checkboxes.style.display = "none";
  } else {
    checkboxes.style.display = "block";
  }
}
</script>
</body>
</html>