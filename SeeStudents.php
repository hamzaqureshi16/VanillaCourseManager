<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./CSS/main.css">
</head>
<body>
    <table>
        <tbody>
        <tr>
            
            <th>Student Name</th>
            <th>Registration</th>
            <th>CGPA</th>
            <th>Semester</th>
            <th>Chat</th>
        </tr>
        <?php
      include('./PHP/DBConnection.php');
      $t_id = $_GET['uid'];
      $c_id = $_GET['courseId'];
      $sql = "SELECT * FROM registered_students WHERE teacher_id = '$t_id' AND c_id='$c_id'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['student_name'] . "</td>";
          echo "<td>" . $row['registration'] . "</td>";
          echo "<td>" . $row['cgpa'] . "</td>";
          echo "<td>" . $row['semester'] . "</td>"; 
          echo "<td><Button class='btn rounded p-1 bg-dark text-light' onclick = 'Chat($row[student_id],$t_id);'>Chat</Button></td>";
          echo "</tr>";
        }
      }
      ?>
        </tbody>

    </table>
<script>
  function Chat(id,tid){
    window.location.href = "./Chat.php?toid="+id+"&fromid="+tid;
  }
</script>
  </body>
</html>