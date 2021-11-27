<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/db/db.php';
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocDoctorument</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<h3>Doctor dashboard</h3>
<hr>
<hr>
<hr>
<hr>
<?php 
      $id = $_SESSION['id'];
      $sql = "SELECT * FROM `doctor` WHERE `id`='$id'";
      $result = $conn->query($sql)->fetch_assoc();
          
           echo "<h3>Hello, " . $result['name'] . "</h3>";



           ?>
           <h4>Appointments </h4>

<?php
    $id = $_SESSION['id'];
     $sql = "SELECT * FROM `appointment` WHERE `did`='$id'";
     $result =$conn->query($sql);

     while($row=$result->fetch_assoc()){
         // echo  json_encode($row);
         $id1=$row['id'];
         $sql = "SELECT * FROM `register` WHERE `id`='$id1'";
         $result2=$conn->query($sql)->fetch_assoc();
         
         
         echo  "Name : ".  $result2['name']."  ";
         echo  "Date : ". $row['date_t'];
         echo "<br>";
     }
    ?>
    <a href="/logout" class ="btn btn-primary" >Logout</a>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>