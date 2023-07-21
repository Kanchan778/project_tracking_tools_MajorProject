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

    function updateStatus(projectId, status) {
        // Make an AJAX POST request to the Laravel route
        axios.post(`/update-status/${projectId}`, {
            status: status = 'Active'
        }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
            }
        })
        .then(response => {
            // Handle the response, e.g., show a success message to the user
            console.log(response.data);
            alert('Project status updated successfully.');
        })
        .catch(error => {
            // Handle errors, e.g., show an error message to the user
            if (error.response && error.response.status === 422) {
                const errors = error.response.data.errors;
                const errorMessage = Object.values(errors).flat().join('\n');
                alert(errorMessage);
            } else {
                console.error(error);
                alert('Failed to update project status.');
            }
        });
    }

