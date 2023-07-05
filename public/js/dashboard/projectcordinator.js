  
  //for profile photo upload
  document.addEventListener('DOMContentLoaded', function() {
    var profileAvatar = document.querySelector('.profile-avatar');
    var avatarInput = document.querySelector('#avatar-input');
    
    profileAvatar.addEventListener('click', function() {
      avatarInput.click();
    });
  });
  
