// JavaScript code for notifications and avatar functionality
    // You can replace the following code with your own logic
    const badge = document.querySelector('.badge');
    const avatar = document.querySelector('.avatar');

    // Simulate notifications count
    const notificationsCount = 3;
    if (notificationsCount > 0) {
      badge.textContent = notificationsCount;
      badge.style.display = 'flex';
    }

    // Simulate avatar click event
    avatar.addEventListener('click', () => {
      alert('Avatar clicked!');
    });

    // JavaScript code for updating the data dynamically
    // You can replace the following code with your own logic

    // Sample data for Projects, Supervisors, Students, Chart, and Chat
    const projects = ['Project 1', 'Project 2', 'Project 3'];
    const supervisors = ['Supervisor 1', 'Supervisor 2', 'Supervisor 3'];
    const students = ['Student 1', 'Student 2', 'Student 3'];
    const chartData = [10, 20, 30];
    const chatMessages = ['Message 1', 'Message 2', 'Message 3'];

    // Update Projects list
    const projectList = document.getElementById('project-list');
    projects.forEach((project) => {
      const li = document.createElement('li');
      li.textContent = project;
      projectList.appendChild(li);
    });

    // Update Supervisors list
    const supervisorList = document.getElementById('supervisor-list');
    supervisors.forEach((supervisor) => {
      const li = document.createElement('li');
      li.textContent = supervisor;
      supervisorList.appendChild(li);
    });

    // Update Students list
    const studentList = document.getElementById('student-list');
    students.forEach((student) => {
      const li = document.createElement('li');
      li.textContent = student;
      studentList.appendChild(li);
    });

    // Update Chat Messages
    const chatMessagesList = document.getElementById('chat-messages-list');
    chatMessages.forEach((message) => {
      const li = document.createElement('li');
      li.textContent = message;
      chatMessagesList.appendChild(li);
    });

    // Update Chart Bar
    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: projects,
        datasets: [{
          label: 'Chart Bar',
          data: chartData,
          backgroundColor: 'rgba(75, 192, 192, 0.6)'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    // for fetching username
    $(document).ready(function() {
      // Function to fetch and display the username
      function fetchUsername() {
          $.ajax({
              url: '/fetch-username', // Update with the actual endpoint URL
              method: 'GET',
              success: function(response) {
                  var username = response.username;
                  $('#username-placeholder').text(username);
              },
              error: function(xhr, status, error) {
                  console.error(error);
              }
          });
      }
  
      // Call the fetchUsername function on page load
      fetchUsername();
  });
  