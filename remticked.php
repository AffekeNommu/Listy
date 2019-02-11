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
    //Make the checked items not display. Database can be cleaned by admin access. Can also correct oopsies.
    $sql = "Update List set Display = FALSE where Checked = TRUE or trim(Item) =''";
    if ($conn->query($sql) === TRUE) {
        header ("location: https://path/to/index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>
