<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Coordinator Dashboard</title>
    <style>
        /* Add your custom CSS styles here */

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            margin-top: 30px;
        }

        .dashboard-item {
            background-color: #E4D0D0;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Project Coordinator Dashboard</h1>
        <div class="dashboard">
            <div class="dashboard-item">
                <h2>Manage Projects</h2>
                <p>View and manage projects</p>
                <a href="#">Go to Projects</a>
            </div>
            <div class="dashboard-item">
                <h2>Manage Team</h2>
                <p>Manage project team members</p>
                <a href="#">Go to Team</a>
            </div>
            <div class="dashboard-item">
                <h2>Generate Reports</h2>
                <p>Generate project reports</p>
                <a href="#">Go to Reports</a>
            </div>
        </div>
    </div>
</body>
</html>
