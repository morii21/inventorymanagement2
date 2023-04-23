// $(document).ready(function() {       
// 	$('#languages').multiselect({		
// 		nonSelectedText: 'Select Language'				
// 	});
// });
$(document).querySelectorAll('input[name="checkbox[]"]').forEach(function(checkbox) {
	checkbox.addEventListener('click', function() {
	  var dropdown = document.getElementById('dropdown');
	  var selectedOption = dropdown.options[dropdown.selectedIndex].value;
	  var checkedBoxes = document.querySelectorAll('input[name="checkbox[]"]:checked');
  
	  if (checkedBoxes.length == 1) {
		dropdown.value = checkedBoxes[0].value;
	  } else if (checkedBoxes.length > 1) {
		dropdown.value = "";
	  } else {
		dropdown.value = selectedOption;
	  }
	});
  });
  