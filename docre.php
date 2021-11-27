<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/db/db.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
</head>
<body>
<h3>Register as doctor</h3>
	 
	<form method="post" action=>
        
			<label><b>Email</b></label>
			<input type="email" placeholder="Enter email" name="email"  >

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password"  >
            <label><b>name</b></label>
            <input type="text" placeholder="Enter name" name="name"  >
            
            <label><b>Speciality</b></label>
			<input type="text" placeholder="Enter speciality" name="speciality"  >

			<!-- <button type="submit"  >Register</button> -->
            <input type="submit" name ="btnsub" value="Submit"/>
            <button type="submit" name ="doc">Already Registered </button>
		 
	</form>
    <?php
        
        if(isset($_POST['btnsub'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
             
            $speciality = $_POST['speciality'];
            $name =$_POST['name'];

            $query = "INSERT INTO `doctor` (`email`, `password`, `name`, `spec`) VALUES ('$email', '$password', '$name', '$speciality');";
            // INSERT INTO `doctor` (`id`, `email`, `password`, `name`, `spec`) VALUES ('1', 'ab@gmail.com', '123', 'Ram', 'cardiologist');
            $result = $conn->query($query);
            // $result =  mysqli($con,$query);

            if($result){
                echo 'record have been entered sucessfully';
            }else{
                echo 'there was error ';
            }
        }
        // $sql="SELECT * FROM `register` WHERE `email`='rushikesh@gmail.com' AND `password`='132'";
        // $result = $conn->query($sql);
        // echo $result->num_rows;
        if(isset($_POST['doc'])){
            header("Location: http://localhost/doctor_login.php");
        }

         


?>
</body>
</html>

