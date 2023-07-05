<!DOCTYPE html>
<html>
<head>
    <title>Supervisor Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Supervisor Page</h1>

    <form id="addForm">
        <h2>Add Supervisor</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" required>

        <label for="username">Username:</label>
        <input type="text" id="username" required>

        <label for="department">Department:</label>
        <input type="text" id="department" required>

        <button type="submit">Add Supervisor</button>
    </form>

    <div id="supervisorList">
        <h2>Supervisor List</h2>
        <ul id="list"></ul>
    </div>

    <script src="script.js"></script>
</body>
</html>
