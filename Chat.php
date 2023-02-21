<!DOCTYPE html>
<html>
  <head>
    <title>Chat Page</title>
    <!-- Add Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
      .chat-bubble {
        max-width: 75%;
        padding: 10px;
        margin: 10px;
        border-radius: 10px;
      }
      .incoming-chat {
        background-color: #f1f0f0;
        margin-right: auto;
      }
      .outgoing-chat {
        background-color: #007bff;
        color: white;
        margin-left: auto;
      }
      #chat{ 
        margin: 0 auto;
        width: 50%;
        margin-left: 25%;

      }
    </style>
  </head>
  <body class="bg-info">
    <div class="container" id='chat'>
      <h1>Chat Page</h1>
      <div class="row">
        <div class="col-8">
          <div class="card mb-3">
            <div class="card-body p-3" style="height: 400px; overflow-y: scroll;">
              <div class="chat-bubble incoming-chat">
                <strong>John:</strong> Hi there!
              </div>
              <div class="chat-bubble incoming-chat">
                <strong>Jane:</strong> Hey John, what's up?
              </div>
              <div class="chat-bubble outgoing-chat">
                <strong>You:</strong> Doing good, thanks for asking!
              </div>
              <div class="chat-bubble outgoing-chat">
                <strong>You:</strong> How about you?
              </div>
            </div>
          </div>
          <form>
            <div class="form-group">
              <input type="text" class="form-control" id="message-input" placeholder="Type your message here">
            </div>
            <button type="submit" class="btn btn-primary" id="submit-button">Send</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Add Bootstrap JavaScript library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
