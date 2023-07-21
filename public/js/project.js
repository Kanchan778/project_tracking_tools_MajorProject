// back to previous page
document.getElementById('back-button').addEventListener('click', function() {
  window.history.back();
});

//open form
document.getElementById('create-project-btn').addEventListener('click', function() {
  document.getElementById('create-project-form').style.display = 'block';
});

//close icon clicked hides the form
document.getElementById('close-icon').addEventListener('click', function() {
  document.getElementById('create-project-form').style.display = 'none';
});

  document.getElementById('project-form').addEventListener('submit', function(event) {
    // Perform any necessary validation on the project details
    if (!validateForm()) {
      event.preventDefault(); // Prevent form submission if validation fails
      return;
    }
  
    // Form submission will proceed if validation passes
  });
  

  document.addEventListener('DOMContentLoaded', function() {
    flatpickr('.date-picker', {
        dateFormat: 'Y-m-d',
        altInput: true,
        altFormat: 'F j, Y',
    });
});

//validating supervisor form
function validateForm() {
  var email = document.getElementById('email').value;
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var department = document.getElementById('department').value;

  // Perform any necessary validation checks
  if (email === '' || username === '' || password === '' || department === '') {
      alert('Please fill in all fields');
      return false; // Prevent form submission
  }

  // Validation passed
  return true; // Allow form submission
}

// Get the button and form elements
var editButton = document.querySelector('.edit-profile-button');
var editForm = document.getElementById('user-invite-modal');
var updateButton = document.getElementById('update-profile-btn');

// Add event listener to the button
editButton.addEventListener('click', function() {
    editForm.style.display = 'block';
});

// Add event listener to the form submission
updateButton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Validate the form
    if (validateForm()) {
        // Submit the form
        editForm.submit();
    }
});


//status

function updateStatus(status, projectId) {
  var form = document.getElementById('status-form-' + projectId);
  var statusInput = document.getElementById('status-input');
  if (form && statusInput) {
      statusInput.value = status;
      form.submit();
  }
  // console.log("Status:", status);
  // console.log("Project ID:", projectId);
  
  // You can also update the hidden input field with the selected status if needed.
  document.getElementById('status-input').value = status;
}


