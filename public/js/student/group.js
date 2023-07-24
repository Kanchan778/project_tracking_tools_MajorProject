document.addEventListener('DOMContentLoaded', function () {
    // Find the "Add" button by its ID
    var addButton = document.getElementById('addButton');
    console.log('addButton:', addButton);

    // Attach a click event listener to the button
    addButton.addEventListener('click', function () {
        // Find the form by its ID
        var form = document.getElementById('project-add-modal');
        console.log('form:', form);

        // Submit the form
        form.submit();
    });
});
