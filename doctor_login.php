<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/db/db.php';
  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor login</title>
</head>
<body>
    <h3>Login as doctor</h3>
<form method="post" action=>
        
        <label><b>Name</b></label>
        <input type="email" placeholder="Enter email" name="email" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        

        <!-- <button type="submit"  >Register</button> -->
        <input type="submit" name ="login" value="login"/>
        
     
</form>
<?php
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `doctor` WHERE `email`='$email' AND `password`='$password'";
        $result = $conn->query($sql);
        // echo $result['id'];
        if($result->num_rows > 0){
            echo '
            <div class="alert alert-warning mt-3" role="alert">
                  sucessful!
            </div>
           ';
           session_start();
           $result=$result->fetch_assoc();
           $_SESSION['id'] = $result['id'];
          
            header("Location: http://localhost/doctor/");
        }
    else {
        echo '
      <div class="alert alert-warning mt-3" role="alert">
            Invalid Credentials!
      </div>
     ';
    }
}
 ?>
</body>
</html>