<?php
 session_start();
 
// Importing DBConfig.php file.
include 'DBconfig.php';
 
// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);


 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
//get officer number
$number = $_GET['uname'];

$_SESSION['num'] = $num;
 
//get officer password
$psw = $_GET['psw'];
 
//Applying User Login query with email and password match.
$Sql_Query = "select * from Users where Number = '$number' and password = '$psw'";

// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));

$result = $con->query($Sql_Query);

if ($result->num_rows > 0) {
   
 //get officer name
  while($row = $result->fetch_assoc()) {
      $FirstName = $row['FirstName'];  
  }  
}

if(isset($check)){
  $SuccessLoginMsg = 'Data Matched';
 
 // Converting the message into JSON format.
$SuccessLoginJson = json_encode($SuccessLoginMsg);
 

// Echo the message and send officer name to the next page
 echo $SuccessLoginJson ; 
  header('Location: /Police/House.php?name='.$FirstName.'&number='.$number);
 }
 
 else{
     
 // If the record inserted successfully then show the message.
$InvalidMSG = 'Invalid Username or Password Please Try Again' ;
 
// Converting the message into JSON format.
$InvalidMSGJSon = json_encode($InvalidMSG);
 
// Echo the message.
 echo 'Invalid Username or Password Please Try Again' . "<br>" ;
 
 }
 
 mysqli_close($con);
?>


<button style="margin-left:99px; margin-top:9px;"  onclick="location.href = 'http://sharongr.mtacloud.co.il/Police/';" >Try Again</button>
