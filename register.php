<?php
include("conn.php");

if(isset($_POST['done'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $psw = $_POST['psw'];

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $insert_data = "SELECT * FROM `logintable` WHERE email = '$email'"  ;
    $insert_query = mysqli_query($conn, $insert_data);

    $row_count = mysqli_num_rows($insert_query);
    if($row_count>0){
        echo "email is already exit";
    }
    else{
        $insert_data = "INSERT INTO `logintable`( `name`, `email`, `mobile`, `password`) VALUES ('  $name','  $email','  $mobile','$psw')";
        $query = mysqli_query($conn,$insert_data);
        header("location: login.php");
    }

}


?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="" method="post"









































>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>name</b></label>
    <input type="text" placeholder="name" name="name" id="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="mobile"><b>mobile</b></label>
    <input type="text" placeholder="mobile" name="mobile" id="mobilet" required>
    <hr>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    
    

    <button type="submit" class="registerbtn" name="done">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
