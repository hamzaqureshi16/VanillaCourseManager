<?php
include('./DBConnection.php');
$from = $_GET['from'];
$to = $_GET['to'];
$sql = "SELECT * FROM `chat` WHERE (`fromid` = '$from' AND `toid` = '$to') OR (`fromid` = '$to' AND `toid` = '$from')";
$result = $conn->query($sql);

$sql = "SELECT name FROM `users` WHERE `id` = '$to'";
$result1 = $conn->query($sql);
$row1 = $result1->fetch_assoc();

while($row = $result->fetch_assoc()){
  if($row['fromid'] == $from){
    echo "<div class='chat-bubble outgoing-chat'>
    <strong>You:</strong> $row[message] <br>
    <small class='text-dark'>$row[time]</small>

  </div>";
  }
  else{
    echo "<div class='chat-bubble incoming-chat'>
    <strong>$row1[name]:</strong> $row[message]<br>
    <small class='text-muted'>$row[time]</small>    
  </div>";
  }
}

?>