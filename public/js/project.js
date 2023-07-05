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
  

