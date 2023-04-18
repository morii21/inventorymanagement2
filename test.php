
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>multiselect</title>
    <script type="text/javascript" src="multiselect-dropdown.js"></script>

</head> 
<body>

  <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
      <label for="one">
        <input type="checkbox" id="one" />First checkbox</label>
      <label for="two">
        <input type="checkbox" id="two" />Second checkbox</label>
      <label for="three">
        <input type="checkbox" id="three" />Third checkbox</label>
    </div>
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

</body>


</html>
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

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
    </style>