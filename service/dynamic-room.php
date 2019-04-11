<?php
$room = $_GET['room'];
$arrfields = explode(',', $room);
foreach($arrfields as $roomSingle) 
{
  echo "
  <div class='row' id='room-select-$roomSingle' style='border:1px solid #CCC;border-radius:4px;margin:10px;padding:10px;'>
    <div class='col-sm-12'  style='margin-bottom:5px;'><strong><span style='font-size:18px;color:RED;font-weight:bold;cursor:pointer' onclick='cancelRoom($roomSingle)'>[<img src='assets/image/delete.png' style='height:15px'/>]</span> Room Number - $roomSingle</strong></div>
    <div class='col-sm-4' ><input name='adult[]' onkeyup='adult($roomSingle)' type='text' id='adult_$roomSingle'  class='form-control' placeholder='Number of Adults' value='' max='3' min='1'/> </div>
    <div class='col-sm-4' ><input name='child[]' onkeyup='child($roomSingle)' type='text' id='child_$roomSingle'  class='form-control' placeholder='Number of Children' value='' max='3' min='0'/></div>
    <div class='col-sm-4' ><input name='infant[]' onkeyup='infant($roomSingle)' type='text' id='infant_$roomSingle' class='form-control' placeholder='Number of Infants' value='' max='3' min='0'/></div>
  </div>
  ";    
}

echo "
<div class='row' style='border-top:5px solid #5cb85c;margin:10px;padding:10px;'>
<div class='col-sm-8'  align='left' style='font-size:15px;font-weight:400;color:GREEN'>
<span id='adult-total'></span>
<span id='child-total'></span>
<span id='infant-total'></span>
<span id='In-total'></span>
<hr>
<span id='room-suggestion' style='font-size:16px;color:RED;'></span>
</div>
  
<div class='col-sm-4'  align='right'>(Assume) Mr. ABC Please, <input id='confirm-booking' class='btn btn-success' type='button' onclick='submitbooking()' value='Confirm and Submit Booking' /></div>
</div>
";
?>



