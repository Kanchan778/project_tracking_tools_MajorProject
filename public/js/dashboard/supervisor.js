//dropdown
document.addEventListener("DOMContentLoaded", function() {
    var settingsLink = document.querySelector(".settings-link");
    var dropdownContent = document.querySelector(".dropdown-content");
  
    settingsLink.addEventListener("click", function(e) {
      e.preventDefault();
      dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    });
  
    document.addEventListener("click", function(e) {
      if (!e.target.closest(".settings-dropdown")) {
        dropdownContent.style.display = "none";
      }
    });
  });
  