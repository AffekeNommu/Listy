<?php
    $servername = "localhost";
    $username = "name";
    $password = "password";
    $dbname = "Shopping";
    $data=array();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 0, '/path/to/mysql/socket');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //Pretty straightforward, get post values and insert into database
    $Item=$_GET["Item"];
    $Shop=$_GET["Shop"];
    $sql = "INSERT INTO List (Item, Shop) VALUES ('$Item','$Shop')";
    if ($conn->query($sql) === TRUE) {
        header ("location: https://path/to/index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
