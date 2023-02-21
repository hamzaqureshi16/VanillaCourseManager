<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./CSS/main.css">
</head>
<body>

<?php
    include('./PHP/DBConnection.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
   {{ $role = $_POST['role'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
    
    
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('user already exists')
        window.location.href='./Signup.php'
            </script>";
        
    }
    else{

    $sql = "INSERT INTO users (name, password, role) VALUES ('$name', '$password', '$role')";
    $result = mysqli_query($conn, $sql);

    
    $sql = "SELECT id FROM users WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];

    if($role === 'teacher'){
        $email = $_POST['email'];
        $sql = "INSERT INTO teacher (uid, email) VALUES ('$id', '$email')";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('user created')
        window.location.href='./Login.php'
            </script>";
    }
    else{
        $session = $_POST['session'];
        $program = $_POST['program'];
        $roll = $_POST['roll'];
        $cgpa = $_POST['cgpa'];
        $semester = $_POST['semester'];
        $reg = $session.'-'.$program.'-'.$roll;
        $sql = "INSERT INTO student (uid,reg ,cgpa, sem) VALUES ('$id', '$reg', '$cgpa', '$semester')";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('user created')
        window.location.href='./Login.php'
            </script>";

    }
    
   } 
   } }


?>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id='form' class='form'>
        <h1>Sign Up</h1>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="minimum 8 characters">
        <label for="role">Role:</label>
        <select name="role" id="role" onchange = "sayhello(this.value)" >
            <option value="student" >student</option>
            <option value="teacher">teacher</option>
        </select>

        <div id='teacher' style="display:none"> <label htmlFor="email">Email:</label>
        
        <input   type="email" name="email" id="email" placeholder='Email' />
        
        </div>
        
        <div id='student' >
        <label >Registration number:</label>
            <select onchange="calcsemester(this.value)" name="session" id="session" required>
                <script>
                    for(var i = 01 ; i<= new Date().getFullYear()-2000; i++){
                        document.write(`<option value = 'FA${i}'>FA${i}</option>`)
                        document.write(`<option value = 'SP${i}'>SP${i}</option>`)
                    }
                </script>
            </select>
            
            <select   name='program' id='program' required>
                <option value="BCS">BCS</option>
                <option value="BBA">BBA</option>
                <option value="BSE">BSE</option>
                <option value="BTY">BTY</option>
                <option value="CVE">CVE</option>
            </select>
            <input  type="number" name='roll' id='roll'  placeholder='000' required/>
            
            <label htmlFor="cgpa">CGPA:</label>
            <input   step='any' max='4' min='0.00' type='number' name='cgpa' id='cgpa' required></input>
            
            <label>Semester</label>
            <input type="text" name="semester" id="semester" disabled > 
            </div>
        </div>
        <input type="submit" value="Sign Up" >
        <input type="button" value="Go to Login" onclick="window.location.href = './Login.php'">
    </form>

   <script src="./JS/Signup.js"></script>

    <!-- <div class="App-header">
    <div className='App-header'>
        
        <h1 class="heading">Sign Up</h1>
        <form onSubmit="" autoComplete='off'>
        <label htmlFor="name">Name:
        <input required  minLength="3" maxLength='100' type="text" name="name" id="name" placeholder='Full Name' class="inputstyle" /></label>
        <br />
        <label htmlFor="password">Password:
        <input required  minLength='8' maxLength="100" type="password" name="password" id="password"  placeholder='minumum 8 characters' class="inputstyle" /></label>
        <br />
        <label htmlFor="role">Role:
            <select name="role" id="role" defaultValue="Student"  class="inputstyle" > 
                <option value="teacher" >Teacher</option>
                <option value="Student" onselect="sayhello()" >Student</option>
            </select>
        
        </label>
        <br />
       
       
        <div >
            <label >Registration number:</label>
            <br />
            <select  name="session" id="session"  >
                
            </select>
            <select   name='program' id='program' >
                <option value="BCS">BCS</option>
                <option value="BBA">BBA</option>
                <option value="BSE">BSE</option>
                <option value="BTY">BTY</option>
                <option value="CVE">CVE</option>
            </select>
            <input  type="number" name='roll' id='roll'  placeholder='000'   required/>
            <br />
            <label htmlFor="cgpa">CGPA:</label>
            <input required  step='any' max='4' min='0.00' type='number' name='cgpa' id='cgpa' ></input>
            <br /> 
            </div>
        <button className='btn btn-primary m-3'>Submit</button>
        <input type="button" value="Go To Login"   />

        </form>
    </div>

    </div> -->
   
</body>
</html>