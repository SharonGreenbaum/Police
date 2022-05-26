<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
        // Importing DBConfig.php file.
        include 'DBconfig.php';
       session_start();
       $num = $_SESSION["num"];
        // Creating connection.
        $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
        $query="select * from Tickets where OfficerNumber = '$num'"; // Fetch data from tickets table
        $result=mysqli_query($conn,$query);
        ?> 
    

    <main>
   <div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Tickets</h2>
                <br>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Ticket Number</th>
                  <th scope="col">Date</th>
                  <th scope="col">ID</th>
                  <th scope="col">Email</th>
                  <th scope="col">Place</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
             
                
                <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[6];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[5];?></td>
                    <td><?php echo $array[4];?></td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
              
            </table>
        </div>
    </div>        
</div>
    
           

    </main>
    

</body>
</html>
