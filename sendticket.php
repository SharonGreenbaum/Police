<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police</title>
    
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
  
</head>
<body>


    <header>
        <img style="height: 100%; width: 100%;" src="https://www.police.gov.il/join/Images/222920032908ee46a83.jpg" alt="police">
    </header>

    <nav>
        <p style=" text-align: center; font-weight: 1000; font-size:xx-large ;">Israel Police</p>
    </nav>

    <main>
<?php


   // $number = $_GET['number'];
   session_start();
   $num = $_SESSION["number"];
   


    
 // Importing DBConfig.php file.
    include 'DBconfig.php';
    $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

   $NumberCar = $_GET['NumberPlate'];
    $sqlid = "select Owner_Id from Cars where Number = '$NumberCar'  ";
    $result = $conn->query($sqlid);
    
    if ($result->num_rows > 0) {
       
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $id = $row['Owner_Id'];
        
      }
    }
    $sqlcontact = "SELECT Contact.mail, Citizens.Firstname FROM Contact INNER JOIN Citizens ON Citizens.ID = Contact.ID WHERE Citizens.ID = '$id'";
    $result2 = $conn->query($sqlcontact);
    
    if ($result2->num_rows > 0) {
     
      // output data of each row
      while($row = $result2->fetch_assoc()) {
          $name = $row["Firstname"];
          $mail = $row['mail'];
     
      }
      

       if(isset($_POST['SubmitButton'])){
           $place = $_POST['place'];
           $Description = $_POST['desc'];
    // Build the INSERT query
    
        $sql = "INSERT INTO Tickets(Place, Description, ID,Email, OfficerNumber)  VALUES ('$place', '$Description', $id, $mail, $num)";
       
    
        // Save to Database
        $result = $conn->query($sql);
    
        // Get the last inserted ID
        if ($result == TRUE) {
            echo 'The ticket was send, your ticket number is:';
            echo $conn->insert_id;
            die();
            
        }    
        else {
            die( mysqli_error($conn) );
        }    
        die();
    }
    }


?>
    
        <form action="#" method="post">
        <fieldset>
            <legend>Write your ticket here</legend>
              <p>Place: <br><input class="txt input" type="text" name ="place" placeholder="Enter your place"></p>
              <p>Description: <br> <textarea name="desc" placeholder="Enter description"></textarea>
              <p><input type="submit" name="SubmitButton" value="send ticket"></p>
        </fieldset>        
    </form>
    </main>
    
    
    <div>
 
</div>
</body>


    
</html>
