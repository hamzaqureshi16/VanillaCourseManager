<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/main.css">
</head>
<body>

<?php 
    include('./PHP/DBConnection.php');

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $row['id'];
            if($role === 'teacher'){
                
                echo '<script>
                alert("successful");
                window.location.href="./TeacherHome.php"
                </script>';
            }
            else{

                echo '<script>alert("successfull")</script>';
            }
        }
        else{
            echo "<script>alert('user not found')
            window.location.href='./Login.php'
                </script>";
        }
    }
?>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit"></input>
    </form>
</body>
</html>