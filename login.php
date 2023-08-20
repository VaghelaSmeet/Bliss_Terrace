 <?php
    $conn = mysqli_connect("localhost","root","","Blissdb");
    if (mysqli_connect_error())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else 
    {
        if (isset($_POST['submit']))
        {
            $username = mysqli_real_escape_string($conn, $_POST['user']);
            $password = mysqli_real_escape_string($conn, $_POST['pass']);
            
            $query = mysqli_query($conn, "SELECT * FROM data WHERE password='$password' and name='$username'");
            $row = mysqli_fetch_array($query);
            $num_row = mysqli_num_rows($query);
            if ($num_row > 0) 
                {            
                    echo '<h1>Correct Username OR Password<h1>';
                    $_SESSION['user_id']=$row['user_id'];
                    header('location:index1.html');
                }
            else
                {
                    echo 'Incorrect Username OR Password';
                }
        }
    }
  ?>