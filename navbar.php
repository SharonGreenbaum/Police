<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">    

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
       <script

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
 
    
    <title>Israel Police</title>
</head>
<?php

if(isset($_GET['logout'])) { 

session_start();
session_destroy();

exit;
}
?>
 <script>
 function help()
 { 
    bootbox.alert("call to support in 055555555");


 }
 
 </script>

<body>
    <ul class="ul1">
        <li class="li"><a class="a1" href="House.php">Home</a></li>
        <li class="li"><a class="a1" href="#help" onclick= help() >Help</a></li>
        <li class="li" style="float:right"><a class="a1" href="http://sharongr.mtacloud.co.il/Police/">Logout</a>
        </li>
      </ul>
</body>
</html>
