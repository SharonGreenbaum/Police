<html>
<body>
    <style><?php include 'main.css'; ?></style>

    
    <header>
        <img style="height: 100%; width: 100%;" src="https://www.police.gov.il/join/Images/222920032908ee46a83.jpg" alt="police">

    </header>
    <nav>
        <p style=" text-align: center; font-weight: 1000; font-size:xx-large ;">Israel Police</p>

    </nav>
<div id="php">
<?php
 //Define your host here.
 $HostName = "localhost";
  
 //Define your database name here.
 $DatabaseName = "sharongr_Police_Israel";
  
 //Define your database username here.
 $HostUser = "sharongr_sharon";
  
 //Define your database password here.
 $HostPass = "12345";

 
// Creating connection.
 $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);


$NumberCar = $_GET['car'];

$sql = "select Color, Model , Year, Status from Cars where Number = '$NumberCar'  ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "the detals about the car with the Number " . $NumberCar. " are: ". "<br>".  "Color: " . $row["Color"]. "<br>" ."Model: " . $row["Model"]."<br>" ."year: " . $row["Year"]."<br>" ."the  Status is: " . $row['Status']."<br>";
  }
} else {
  echo "the car number: " . $NumberCar . " isn't in the system";
}


 if(isset($_POST['SubmitButton'])){
       $new = $_POST['newStatus'];
       
$sqlUpdate = "UPDATE Cars SET Status= '$new' where Number = '$NumberCar'  ";
if ($conn->query($sqlUpdate) === TRUE) {
  echo 'the update success the new status is ' .$new ;
} else {
  echo "Error updating record: " . $conn->error;
}

}
$conn->close();


 ?>
 

        <form action="#" method="post" >
            <fieldset>
            <div>update status</div>
<select name="newStatus" >
  <option value="Normal">Normal</option>
  <option value="Stolen">Stolen</option>
  <option value="Invalid">Invalid</option>
  <option value="Caught">Caught</option>
</select>
           <input value="update" type ='submit'name= 'SubmitButton' >

                
            </fieldset>
        </form>


 
 </div>
</html>
