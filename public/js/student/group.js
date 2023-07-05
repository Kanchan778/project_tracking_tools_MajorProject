document.getElementById('add-member').addEventListener('click', function() {
    var container = document.getElementById('members-container');
    var membersCount = container.children.length;
    var memberDiv = document.createElement('div');
    memberDiv.classList.add('member');

    var emailInput = document.createElement('input');
    emailInput.type = 'email';
    emailInput.name = 'members[' + membersCount + '][email]';
    emailInput.required = true;
    memberDiv.appendChild(emailInput);

    var rolesDiv = document.createElement('div');
    rolesDiv.classList.add('roles');
    var rolesLabel = document.createElement('label');
    rolesLabel.htmlFor = 'member_roles';
    rolesLabel.textContent = 'Roles:';
    rolesDiv.appendChild(rolesLabel);

    var rolesSelect = document.createElement('select');
    rolesSelect.name = 'members[' + membersCount + '][roles][]';
    rolesSelect.multiple = true;
    rolesSelect.required = true;
    var rolesOptions = [
        { value: 'Frontend', text: 'Frontend' },
        { value: 'Backend', text: 'Backend' },
        { value: 'Testing', text: 'Testing' },
        { value: 'Report', text: 'Report' },
        { value: 'Research', text: 'Research' },
        { value: 'Full Stack', text: 'Full Stack' },
    ];
    rolesOptions.forEach(function(option) {
        var roleOption = document.createElement('option');
        roleOption.value = option.value;
        roleOption.text = option.text;
        rolesSelect.appendChild(roleOption);
    });
    rolesDiv.appendChild(rolesSelect);

    memberDiv.appendChild(rolesDiv);

    container.appendChild(memberDiv);
});