<?php
$servername = "localhost";
$serveruser = "root";
$serverpassword = "123";
$dbname = "imperio";

// Create connection
$conn = new mysqli($servername, $serveruser, $serverpassword, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
    }

    $sql = "INSERT INTO players (name, password) VALUES ('$name', '$password')";
    $result = $conn->query($sql);
    if (!$result)
    {
        if ($conn->errno == 1062) //duplicated key
        {
            $sql = "SELECT password FROM players WHERE name='$name'";
            $result = $conn->query($sql);
            if ($password != $result->fetch_object()->password)
            {
                echo "La contraseña ingresada para <b>" . $name . "</b> es incorrecta.<br>";
                exit();
            }
        }
    }
    include("main.html");
}

$conn->close();
