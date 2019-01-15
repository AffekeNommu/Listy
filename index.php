<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "Shopping";
    $data=array();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, 0, '/path/to/mysql/socket');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT Checked, Item, Shop FROM List where display =1 order by Shop, Item";
    $result = $conn->query($sql);
    // output data of each row
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<table border=1><tr><th>Ticked</th><th>Item</th><th>Shop</th></tr>';
    echo '<form action="https://path/to/checks.php" method="POST">';
    while($row = $result->fetch_assoc()) {
        echo "<tr align=center><td>";
        $checked = '';
        if($row['Checked'] == TRUE){
            $checked = 'checked';
        }
        $item=$row['Item'];
        echo '<input type="checkbox" value="'.$item.'" name="chk[]"'.$checked.'>';
        echo "</td><td>";
        echo $row['Item'];
        echo "</td><td>";
        echo $row['Shop'];
        echo "</td></tr>";
    }
    echo '</table>';
    echo '<input type="submit" value="Save Ticks"></form><br>';
    echo '<form action="https://path/to/inserto.php">';
    echo 'Item <input type="text" name="Item">';
    echo '<select name="Shop">';
    echo '<option value="Coles">Coles</option>';
    echo '<option value="Chemist">Chemist</option>';
    echo '<option value="BigW">BigW</option>';
    echo '<option value="Woolworths">Woolworths</option>';
    echo '<option value="Aldi">Aldi</option>';
    echo '<option value="Other">Other</option>';
    echo '</select><br>';
    echo '<input type="submit" value="Add item">';
    echo '</form>';
    echo '<form action ="https://path/to/remticked.php" method="POST">';
    echo 'Save ticks before removing<br>';
    echo '<input type="submit" value="Remove Ticked">';
    echo '</form>';
    $conn->close();
    ?>
