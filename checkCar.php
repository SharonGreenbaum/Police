<?php
 
// Importing DBConfig.php file.
include 'DBconfig.php';
 
// Creating connection.
 $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);


$status = 'unknown';

 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 $NumberCar = $_GET['NumberPlate'];
 

 
//Applying User Login query with email and password match.
$sql = "select * from Cars where Number = '$NumberCar'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $status = $row['Status'];
      $model = $row['Model'];
      $color = $row['Color'];
      
      
      if($status == 'Stolen'){
        $sql2 = "SELECT * FROM Stolen_Car WHERE number_car='$NumberCar'";
        $result2 = $conn->query($sql2);
         if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()){
                $details = $row['Details'];
                $date = $row['stolen_year'];

                }
            }
        $array = [
    'status' => $status,
    'model' => $model,
    'color' => $color,
    'date' => $date,
    'details' => $details
];

echo json_encode($array);
        }

      if($status == 'Invalid'){
        $sql3 = "select * from Vehicles_not_valid where NumberCar = '$NumberCar'  ";
        $result3 = $conn->query($sql3);
         if ($result3->num_rows > 0) {
            while($row = $result3->fetch_assoc()){
                $details = $row['Details'];
                $date = $row['date'];
                }
            }
        $array = [
    'status' => $status,
    'model' => $model,
    'color' => $color,
    'date' => $date,
    'details' => $details
];

echo json_encode($array);
        }
     
      //else{
      //  $array = [null];
       //  echo json_encode($array);
      //}  
        
     }
} 





$conn->close();
