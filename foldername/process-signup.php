<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) 
    {
        $link = mysqli_connect("localhost", "root", "", "prototype_data");
        if (!$link) 
        {
            die("Connection Error: " . mysqli_connect_error());
        }
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($link, $sql)) 
        {
            echo "Sign up Successful!";
        }
         else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }
        mysqli_close($link);
    } 
    else 
    {
        echo "All fields are required!";
    }
}
?>