<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police</title>
    <link rel="stylesheet" href="main.css">


</head>
  <?php
  include('navbar.php');
  ?> 
  
<body>
    <header>
        <img style="height: 100%; width: 100%;" src="https://www.police.gov.il/join/Images/222920032908ee46a83.jpg" alt="police">

    </header>
    <nav>
        <p style=" text-align: center; font-weight: 1000; font-size:xx-large ;">Israel Police</p>
    </nav>
    

    <?php
        $name= $_GET['name']; //officer name
        $number = $_GET['number']; //officer number
        
        //Save as a globals var
        session_start();
        $_SESSION['number'] = $number;
        $_SESSION['name'] = $name;
        ?> 
    
//check officer number
    <script type="text/javascript">
        var number = '<?php echo $number?>';
        console.log('your number:', number);
    </script>
    
    <main>
        <br>
        <h3 >Hello <?php echo $name?> </h3>
      
        <br>
        <br>
        <div id="navdiv">
            <ul>
                <li class="list"><a href="drive.html">Start Drive</a></li>
                <br>
                <li class="list"><a href="car.html">Check car number</a></li>
                <br>
                <li class="list"><a href="id.html">Check id number</a></li>
                <br>
            </ul>
            
        </div>
        
        <p>To see all your tickets click <a href="/Police/tickets.php?number= <?php echo $number; ?>"><b>here</b></a></p>
        
           
    <?php
if(isset($_GET['logout'])) { 

session_start();
session_destroy();

exit;
}
?>
    </main>
    

</body>
</html>
