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
                <th>
                    Course Name
                </th>
                <th>
                    Department
                </th>
                <th>
                    Class
                </th>
                <th>
                    Credit Hours
                </th>
                <th>
                    Teacher
                </th>
                <th>
                    Teacher email
                </th>
                
            </tr>

            <?php
            include('./PHP/DBConnection.php');
            $sql = "SELECT cc.*, u.name AS teacher_name, t.email AS teacher_email
            FROM course_catalog cc
            JOIN teaches tc ON cc.c_id = tc.c_id
            JOIN teacher t ON tc.t_id = t.uid
            JOIN users u ON t.uid = u.id
            WHERE cc.c_id NOT IN (
                SELECT course_id
                FROM registered
                WHERE student_id = 10
            )
            ";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $row['c_name'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['c_hours'] . "</td>"; 
                    echo "<td>" . $row['teacher_name'] . "</td>"; 
                    echo "<td>" . $row['teacher_email'] . "</td>"; 
                    echo "<td><Button class='rounded bg-danger p-1'>Register</Button></td>";
                    echo "</tr>";
                }
            }

            ?>
        </tbody>
    </table>
</body>
</html>