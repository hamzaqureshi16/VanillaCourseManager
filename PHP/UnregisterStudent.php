<?php
    include('./DBConnection.php');
    $id = $_GET['id'];
    $c_id = $_GET['courseid'];

    
    $sql = "DELETE FROM `registered` WHERE `student_id`='$id' and `course_id`='$c_id' ;";
    $res = mysqli_query($conn,$sql);
    header('Location: ../StudentHome.php');
?>