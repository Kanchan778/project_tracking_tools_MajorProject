var pusher = new Pusher('YOUR_PUSHER_APP_KEY', {
    cluster: 'YOUR_PUSHER_CLUSTER',
    useTLS: true
  });
  
  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    // Update the chat interface with the received message
    var message = data.message;
    // Add code here to update the chat interface with the received message
  });

  //form 
  $(document).ready(function() {
    $('.chat-form').submit(function(e) {
      e.preventDefault();
      var message = $('textarea').val();
      $.ajax({
        method: 'POST',
        url: '/pusher/broadcast',
        data: { message: message },
        success: function(response) {
          // Handle the success response if needed
          $('textarea').val('');
        },
        error: function(error) {
          // Handle the error if needed
        }
      });
    });
  });


  $(document).ready(function() {
    $('.btn-floating').click(function() {
      Chatify.openChat();
    });

    // Chatify.init({
    //   selector: '#chatify-container',
    //   server: '/chatify', // Replace with the appropriate Chatify server endpoint
    //   pusher: {
    //     key: '8cfa96120028307e2777' // Replace with your Pusher app key
    //   },
    // //   auth: {
    // //     headers: {
    // //       'Authorization': 'Bearer YOUR_AUTH_TOKEN' // Replace with your authentication token
    // //     }
    // //   }
    // });
  });