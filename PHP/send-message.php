<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $message = $_POST['message'];
  $sender = $_POST['from'];
  $to = $_POST['to'];

   
  header('Content-Type: application/json');
  echo json_encode(['success' => true]);
} else {
  // Send an error response if the request method is not POST
  header('HTTP/1.1 405 Method Not Allowed');
  header('Allow: POST');
  echo 'Method Not Allowed';
}
