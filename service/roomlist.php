<?php
header("Content-Type:application/json");
include 'db.php';
$myArray = array();
if ($result = $mysqli->query("SELECT * FROM rooms")) 
{

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();
?>