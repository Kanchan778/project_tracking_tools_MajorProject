    function submitForm() {
        // Get the form element
        var form = document.getElementById('project-add-modal');

        // Validate if at least one username is selected
        var selectedUsernames = form.elements['selectedUsernames[]'];
        if (!selectedUsernames || selectedUsernames.length === 0) {
            alert('Please select at least one username.');
            return false;
        }

        // You can add more validation if needed.

        // If the validation passes, submit the form
        form.submit();
        return true;
    }

