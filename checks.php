<?php
    $servername = "localhost";
    $username = "Listy";
    $password = "L15tyU53r";
    $dbname = "Shopping";
    $data=array();
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 0, '/media/zds/klvn8r/private/mysql/socket');
    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //Get the array of checked items
    $checkbox = $_POST['chk'];
    //Clear all checks on the displayed items as a cleanup before setting them
    $sql='update List set Checked=FALSE where Display=TRUE';
    if ($conn->query($sql) === TRUE) {}
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //nothing to change
    if ($checkbox[0]==''){
        $conn->close();
        header ("location: https://klvn8r.polybotes.feralhosting.com/list/index.php");
    }
    //Walk through array and set the check flag on the items that were ticked
    for ($i = 0; $i <count($checkbox);$i++){
        $item= $checkbox[$i];
        $sql="update List set Checked=TRUE where Item ='$item'";
        if ($conn->query($sql) === TRUE) {
            header ("location: https://klvn8r.polybotes.feralhosting.com/list/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>
