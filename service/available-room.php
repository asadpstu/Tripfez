<?php
header("Content-Type:application/json");
if (isset($_GET['date']) && $_GET['date']!="") 
{
    include 'db.php' ;
    $myArray = array();
	$date = $_GET['date'];
	if ($result = $mysqli->query("
    SELECT RoomNumber,
    (Select name FROM booking where `BookedFor`='$date' AND RoomNumber= rooms.`RoomNumber`) As 'name',
    (Select status FROM booking where `BookedFor`='$date' AND RoomNumber= rooms.`RoomNumber`) As 'status',
    (Select DateTime FROM booking where `BookedFor`='$date' AND RoomNumber= rooms.`RoomNumber`) As 'DateTime' 
    FROM rooms")) 
    {

        while($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
                $myArray[] = $row;
        }
        if(mysqli_num_rows($result)>0)
        {
         echo json_encode($myArray);   
        }
        else
        {
            response($roomId, "No Booking Yet", 200,"Valid Request");    
        }
        
    }
}
else
{
	response(NULL, NULL, 400,"Invalid Request");
}
 
function response($order_id,$amount,$response_code,$response_desc){
	$response['order_id'] = $order_id;
	$response['amount'] = $amount;
	$response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>