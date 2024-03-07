<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['username']) && isset($_POST['password'])) 
    {
        $link = mysqli_connect("localhost", "root", "", "prototype_data");
        if (!$link)
        {
            die("Connection failed! " . mysqli_connect_error());
        }
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($link, $sql);
        
        if ($result && mysqli_num_rows($result) > 0)
        {
            echo "Login Successful!";
        }
         else 
        {
            echo "PLease Put valid Username or Password";
        }
        mysqli_close($link);
    }
     else 
    {
        echo "All fields are required!";
    }
}
?>
