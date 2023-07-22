// JavaScript to handle dynamic addition of username and role selection fields

let userRolesCounter = 1;

function addUserRolesField() {
    const userRolesForm = document.getElementById('userRolesForm');

    const userRolesField = `
        <div class="user-roles-field mt-3">
            <label for="username_${userRolesCounter}">Select Username:</label>
            <select id="username_${userRolesCounter}" class="form-control" name="selectedUsernames[]" required>
                <option value="">Select Username</option>
                @foreach ($studentUsernames as $username)
                    <option value="{{ $username }}">{{ $username }}</option>
                @endforeach
            </select>

            <div class="form-group row align-items-center mt-2">
                <label class="col-3">Role:</label>
                <select class="form-control col" name="selectedRoles_${userRolesCounter}[]" multiple required>
                    <option value="">Select Roles</option>
                    <option value="Leader">Leader</option>
                    <option value="Frontend">Frontend</option>
                    <option value="Backend">Backend</option>
                    <option value="Testing">Testing</option>
                    <option value="Researcher">Researcher</option>
                    <option value="Documentation">Documentation</option>
                </select>
            </div>
        </div>
    `;

    userRolesForm.insertAdjacentHTML('beforeend', userRolesField);
    userRolesCounter++;
}