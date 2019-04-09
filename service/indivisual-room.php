<?php
header("Content-Type:application/json");
if (isset($_GET['roomId']) && $_GET['roomId']!="" && isset($_GET['date']) && $_GET['date']!="") {
    include 'db.php' ;
    $myArray = array();
    $roomId = $_GET['roomId'];
    $date   = $_GET['date'];
    
	$result = mysqli_query(
	$mysqli,
	"SELECT * FROM `booking` WHERE RoomNumber=roomId AND BookedFor='$date' ");
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_array($result);
        $booked = "Booked";
        $date = $row['BookedFor'];
        $contact = $row['Contact'];
        $name = $row['Name'];

        response($name, $contact, $date,$booked);
        mysqli_close($mysqli);
    }
    else
    {
		response("Not Found", "No Contact", $date,"Not Booked");
	}
}
else
{
	response(NULL, NULL, 400,"Invalid Request");
}
 
function response($name, $contact, $date,$booked){
	$response['BookingName'] = $name;
	$response['Contact'] = $contact;
	$response['BookedDate'] = $date;
	$response['BookingStatus'] = $booked;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>