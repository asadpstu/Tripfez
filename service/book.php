<?php
   $adult = $_POST['adult'];
   $child = $_POST['child'];
   $infant = $_POST['infant'];
   $total = $adult + $child + $infant;
   $name = $_POST['name'];
   $contact = $_POST['contact'];
   $date = $_POST['date'];
   $roomnumber = $_POST['roomnumber'];
   
   include 'db.php' ;
   $sql= mysqli_query($mysqli,"INSERT INTO booking
   (`Name`,`RoomNumber`,`TotalMember`,`Adult`,`Children`,`Infant`,`BookedFor`,`Contact`,`status`) VALUES
   ('".$name."','".$roomnumber."','".$total."','".$adult."','".$child."','".$infant."','".$date."','".$contact."','BOOKED')"); 
    

   echo "Booked";

    
    
 ?>
