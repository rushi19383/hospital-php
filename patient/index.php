<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/db/db.php';
 
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
</head>
<body>
    <h3>patient dashboard</h3>
<?php 
      $id = $_SESSION['id'];
      $sql = "SELECT * FROM `register` WHERE `id`='$id'";
      $result = $conn->query($sql)->fetch_assoc();
          
           echo "<h1>Hello, " . $result['name'] . "</h1>";
           ?>
    <h3>-----------------------------------------------------------------------</h3>
    <form method="post" >    
    <select class="form-select" name ='doctor_id' aria-label="Default select example">
   <?php
     $sql = "SELECT * FROM `doctor`";
     $result = $conn->query($sql) ;
    
     while( $row=$result->fetch_assoc()){
         $name =$row['name'];
         $spec =$row['spec'];
         $id = $row['id'];
  echo  "<option value='$id'> $name  $spec  </option>";
}
  


  ?>
 </select>

        
        <label><b>Date</b></label>
        <input type="text" placeholder="dd/mm/yyyy " name="date" required>

      
        

        <!-- <button type="submit"  >Register</button> -->
        <input type="submit" name ="btn" value="submit"/>
        
     
</form>
    
    

    
  

  <?php
        
        if(isset($_POST['btn'])){
            $date = $_POST['date'];
            $id = $_SESSION['id'];
            $did=$_POST['doctor_id'];

           
            
            $query = "INSERT INTO `appointment` (`id`, `pid`, `did`, `date_t`) VALUES (NULL, '$id', '$did', '$date');";
            
            // INSERT INTO `appointment` (`id`, `pid`, `did`, `date_t`) VALUES (NULL, '5', '4', '31/12/2000');
            echo $conn->error;
             
            $result = $conn->query($query);
            // $result =  mysqli($con,$query);
            
            if($result){
                echo 'record have been entered sucessfully';
            }else{
                echo 'there was error ';
            }
        }
?>

    
 

<?php

     
     
     


    

    
    if(isset($_POST['logout'])){
        header("Location: http://localhost/login.php");
    }
    ?> 
 <a href="/logout" class ="btn btn-primary" >Logout</a>     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
</body>
</html>