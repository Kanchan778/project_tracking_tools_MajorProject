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
// Handle click event of "Edit Profile" button
const editProfileButton = document.querySelector('.edit-profile-button');
editProfileButton.addEventListener('click', () => {
  // Show the edit profile form
  const editProfileForm = document.getElementById('edit-profile-form');
  editProfileForm.style.display = 'block';
});

//status
function toggleDropdown(projectId) {
  const dropdownMenu = document.getElementById(`statusDropdownMenu${projectId}`);
  const isVisible = dropdownMenu.style.display === 'block';
  dropdownMenu.style.display = isVisible ? 'none' : 'block';
}

function setStatus(projectId, status) {
  console.log('Selected status:', status);

  const statusDropdown = document.getElementById(`statusDropdown${projectId}`);
  const remainingDays = document.querySelector(`#statusDropdown${projectId} + .dropdown-menu .remaining-days`);

  if (status === 'Complete') {
    statusDropdown.classList.add('completed');
    remainingDays.style.display = 'none';
  } else {
    statusDropdown.classList.remove('completed');
    remainingDays.style.display = 'block';
  }

  // Hide the dropdown menu after selecting a status
  const dropdownMenu = document.getElementById(`statusDropdownMenu${projectId}`);
  dropdownMenu.style.display = 'none';
}

    // Get the delete project link element by its id
    document.addEventListener('DOMContentLoaded', function() {
      const deleteProjectLinks = document.getElementsByClassName('delete-project-link');
    
      Array.from(deleteProjectLinks).forEach(function(link) {
        link.addEventListener('click', function(event) {
          event.preventDefault();
    
          const confirmation = confirm("If you delete this now, it won't be recovered again. Would you like to delete it?");
    
          if (confirmation) {
            const projectId = link.dataset.projectId;
            deleteProject(projectId);
          }
        });
      });
    
      function deleteProject(projectId) {
        const deleteForm = document.getElementById('delete-project-form-' + projectId);
    
        deleteForm.addEventListener('submit', function(event) {
          event.preventDefault();
    
          // Perform the deletion action
          // Replace this with your actual deletion logic
    
          alert('Project deleted successfully!');
        });
    
        deleteForm.submit();
      }
    });
    