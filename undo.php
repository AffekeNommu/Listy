<?php
    $servername = "localhost";
    $username = "user";
    $password = "password";
    $dbname = "Shopping";
    $data=array();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 0, '/path/to/mysql/socket');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //If it was modified in the last 10 minutes and currently not displayed make it display and clear check
    $sql="update List set Display=TRUE, Checked=FALSE where (timediff(cURRENT_TIMESTAMP(),Timestamp) < '00:10:00') and Display=FALSE";
    if ($conn->query($sql) === TRUE) {
        header ("location: https://path/to/index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
