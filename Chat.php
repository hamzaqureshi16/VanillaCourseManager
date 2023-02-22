<!DOCTYPE html>
<html>
  <head>
    <title>Chat Page</title>
    <!-- Add Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   
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
        text-align: right;
        width: fit-content;
          

      }
      #chat{ 
        margin: 0 auto;
        width: 70%;
        margin-left: 25%;

      }
    </style>
  </head>
  <?php
    echo "<script type='text/javascript'>var from='$_GET[fromid]'
    to='$_GET[toid]'</script>";
  ?>
  <body class="bg-info">
    <div class="container" id='chat'>
      <h1>Chat with <u>
      <?php 
      include('./PHP/DBConnection.php');
      $sql = "SELECT name FROM `users` WHERE `id` = '$_GET[toid]'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row['name'];
      ?>
      </u></h1>
      <div class="row">
        <div class="col-8">
          <div class="card mb-3">
            <div class="card-body p-3" style="height: 400px; overflow-y: scroll;" >
              <div id='chatarea'>

              </div>
            </div>
          </div>
          <form id='msgform' autocomplete="off">
            <div class="form-group" >
              <input type="text" class="form-control" id="message-input" placeholder="Type your message here">
              
              <button type="button" onclick="SendMsg()" class="btn  btn-muted bg-primary  p-1 m-1 " id="submit-button">Send <span class="bi bi-send-fill"></span> </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      const SendMsg = () =>{
        const http = new XMLHttpRequest();
        http.onreadystatechange = ()=>{};
        http.open('POST',`./PHP/send-message.php`,true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.send(`from=${from}&to=${to}&message=${document.getElementById('message-input').value}`);
        document.getElementById('message-input').value = '';
        http.onload = () => {
          console.log(http.response);
        };
        return false;
      }

     setInterval(function() {
      const http = new XMLHttpRequest();
      http.onreadystatechange = ()=>{
        if(http.readyState == 4 && http.status == 200){
          document.getElementById('chatarea').innerHTML = http.responseText;
        }
      };
      http.open('GET',`./PHP/get-messages.php?from=${from}&to=${to}`,true);
      http.send();
    }, 100);

    </script>
    <!-- Add Bootstrap JavaScript library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
