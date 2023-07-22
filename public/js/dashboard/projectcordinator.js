document.querySelector('.edit-profile-button').addEventListener('click', function () {
  document.querySelector('.edit-profile-form').style.display = 'block';
  this.style.display = 'none';
});

document.querySelector('#close-icon').addEventListener('click', function () {
  document.querySelector('.edit-profile-form').style.display = 'none';
  document.querySelector('.edit-profile-button').style.display = 'block';
});



document.querySelector('#avatar-input').addEventListener('change', function () {
  const previewImage = document.querySelector('#avatar-preview');
  const file = this.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener('load', function () {
      previewImage.src = reader.result;
    });

    reader.readAsDataURL(file);
  }
});


//submit
// document.querySelector('#profile-form').addEventListener('submit', function(event) {
//   event.preventDefault();
//   // console.log('Form submission triggered'); // Add this line to check if the form submission is triggered
//   // Rest of your code to handle form submission
// });

// Get references to the icon, the file input, and the form
const uploadIcon = document.getElementById('upload-icon');
const fileInput = document.getElementById('avatar-input');
const profileForm = document.getElementById('profile-form');

// Add a click event listener to the icon
uploadIcon.addEventListener('click', () => {
    // Simulate a click on the file input
    fileInput.click();
});

// Add an event listener to the file input to update the preview image
fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const previewImg = document.getElementById('avatar-preview');
            previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Add a click event listener to the "Update Profile" button
const updateButton = document.querySelector('.updatebtn');
updateButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default form submission behavior
    // Manually submit the form
    profileForm.submit();
});
