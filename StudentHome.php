<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./CSS/main.css">
</head>
<body>

<?php
session_start();
if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
<h2 class="navbar-brand bg-danger rounded p-1 m-1" style="margin:'6px'">Course Manager</h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active text-light" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-ligth" href='#' onclick='AvailabelCourse(<?php echo $id;?>)'>
          Apply</a>
      </li>
     

    </ul>
    <div class = 'd-flex'>
    <h3 class='nav-link m-1 text-light ' style='font-size: larger'> <u><?php
    if(isset($_SESSION['name'])){
      echo $_SESSION['name'];

      }
      else{
        header("Location: ./Login.php");
      }
      
      ?>
      
  </u>
    </h3>  
    <button class='btn btn-danger rounded m-2 p-1' onclick="window.location.href = './PHP/logout.php'">Logout</button>
        
 
  </div>
  </div>

  
</nav>

<table>
    <tbody>
      <tr>
        <th>Couse Name</th>
        <th>Credit Hours</th>
        <th>Department</th>
        <th>Class</th>
        <th>Teacher</th>
        <th>Teacher Email</th>
        <th>Unregister</th>
        <th></th>
      </tr>

      <?php
      include('./PHP/DBConnection.php');
      
      $sql = "SELECT * FROM student_courses WHERE uid = '$id'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['c_name'] . "</td>";
          echo "<td>" . $row['c_hours'] . "</td>";
          echo "<td>" . $row['department'] . "</td>";
          echo "<td>" . $row['class'] . "</td>";
          echo "<td>" . $row['teacher_name'] . "</td>";
          echo "<td>" . $row['teacher_email'] . "</td>";
          echo "<td><button class='rounded bg-danger p-1'>Unregister</button></td>";
          echo "<td><button class='rounded bg-danger p-1'  onclick='Chat($row[t_id])'>Chat</button></td>";
          
          echo "</tr>";
        }
      }
      ?>
      

    </tbody>

</table>
<script>
  function getStudents(courseId) { 
  window.location.href = './SeeStudents.php?courseId=' + courseId + '&uid=' + <?php echo $id?>;
}
function AvailabelCourse(id) {
  window.location.href = './RegisterStudent.php?uid=' + id;
}
function Chat(id){
    console.log(id);
    window.location.href = './Chat.php?toid=' + id + '&fromid=' + <?php echo $id?>;
}

</script>
</body>
</html>