<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "Shopping";
    $data=array();
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 0, '/path/to/mysql/socket');
    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $checkbox = $_POST['chk'];
    $sql='update List set Checked=FALSE where Display=TRUE';
    if ($conn->query($sql) === TRUE) {}
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($checkbox[0]==''){
        $conn->close();
        header ("location: https://path/to/index.php");
    }
    for ($i = 0; $i <count($checkbox);$i++){
        $item= $checkbox[$i];
        $sql="update List set Checked=TRUE where Item ='$item'";
        if ($conn->query($sql) === TRUE) {
            header ("location: https://path/to/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    ?>
