<?php
$conn = mysqli_connect("localhost","root","","Blissdb");
// Check connection
if (mysqli_connect_error())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['user']);
        $email = mysqli_real_escape_string($conn, $_POST['gmail']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = mysqli_real_escape_string($conn, $_POST['cpassword']);

        // Insert user data into the users table
        $sql = "INSERT INTO data (name, email, address, number, password) VALUES ('$name', '$email','$address','$number' ,'$password')";

        if (mysqli_query($conn, $sql)) {
            header("Location: login.html");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>