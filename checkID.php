<html>
<body>
    <style><?php include 'main.css'; ?></style>
    <style><?php include 'IDphp.css'; ?></style>

    
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
 

$id = $_GET['id'];


$sql = "SELECT Citizens.Firstname, Citizens.LastName, Contact.phone, Contact.mail FROM Citizens INNER JOIN Contact on Contact.ID = Citizens.ID WHERE Citizens.ID=$id";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "the detals about the Citizens with the id "  . $id. " are: ". "<br>".  "First name: " . $row["Firstname"]. "<br>" . "Last name: " . $row["LastName"]. "<br>" . "phone: " . $row["phone"] . "<br>" . "mail: " . $row["mail"]."<br>"  ;
 
  }
} else {
  echo "the ID: " . $id . " isnt in the system";
}
$conn->close();

 
 ?>

 
 </div>
</html>
