<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dropdown Box on Click</title>
<style>
  /* Styling for dropdown */
  #dropdown {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
  }
</style>
</head>
<body>

<!-- Textarea -->
<textarea id="myTextarea" rows="4" cols="50">Click here to trigger dropdown</textarea>

<!-- Dropdown Box -->
<div id="dropdown">
  <select id="dropdownSelect">
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
  </select>
</div>

<script>
  // Get textarea and dropdown elements
  const textarea = document.getElementById('myTextarea');
  const dropdown = document.getElementById('dropdown');

  // Show dropdown when textarea is clicked
  textarea.addEventListener('click', function() {
    dropdown.style.display = 'block';
  });

  // Hide dropdown when clicked outside of it
  window.addEventListener('click', function(event) {
    if (!dropdown.contains(event.target) && event.target !== textarea) {
      dropdown.style.display = 'none';
    }
  });

  // Handle dropdown option selection
  const dropdownSelect = document.getElementById('dropdownSelect');
  dropdownSelect.addEventListener('change', function() {
    // Do something with the selected option value
    console.log('Selected option:', dropdownSelect.value);
    // You can perform any action you want here based on the selected option
    // For example, you can update the textarea content with the selected option
    textarea.value = dropdownSelect.value;
    // Hide the dropdown after selection
    dropdown.style.display = 'none';
  });
</script>

</body>
</html>
