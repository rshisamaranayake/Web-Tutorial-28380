<?php

$a =$_REQUEST['id'];
$b= $_REQUEST['name'];
$c= $_REQUEST['email'];
$d = $_REQUEST['pass'];

$server = "localhost";
$user = "root";
$pw = "";
$db ="university";

$con = new mysqli($server ,$user ,$pw ,$db);

if ($con->connect_error)
{
    die("Connection failed:".$con->connect_error);
}
else{
    echo "Success";
}

$insert = "INSERT INTO students(id, name, email,password) VALUES('$a','$b','$c','$d')";
mysqli_query($con, $insert);

$sql = "SELECT id, name, email, password FROM students";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No student details found.";
}

mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Page</title>
    <style>
         table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black; /* Add borders to table cells */
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: gray;
        }
    </style>
</head>
<body>
    
</body>
</html>