<?php
$from = $_POST['from'];
$to = $_POST['to'];
$msg = $_POST['message'];
include('./DBConnection.php');
$sql = "INSERT INTO `chat` (`fromid`, `toid`, `message`) VALUES ($from, $to, '$msg')";
$result = $conn->query($sql);

 
// include('./DBConnection.php');
// $from = $_GET['from'];
// $to = $_GET['to'];
// $msg = $_GET['message'];
// $sql = "INSERT INTO `chat` (`fromid`, `toid`, `message`) VALUES ('$from', '$to', '$msg')";
// $result = $conn->query($sql);
?>