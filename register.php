<?php 
include ("connect.php");

session_start();

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $result=mysqli_query($conn, "SELECT * FROM client_users WHERE password='$password'");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row) ){
        
            $_SESSION['valid'] = $row['email'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['id'] = $row['id'];
    }

  
    else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    if(isset($_SESSION['valid'])){
        header("Location: home.php");
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market Place</title>
    <link rel="stylesheet" href="CSS/registers.css">
    <script src="https://kit.fontawesome.com/cece6eae45.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">

        <div class="back">
            <a href="index.php"><i class="fa-solid fa-left-long fa-3x"></i></a>
        </div>
      
    
        <div class="logo">
              
            <h1>Online</h1><h1 id="colored">Green</h1>
            <h1 id="market">Market Place</h1>
            <p>Empowering Farmers of Marinduque through online distribution to Consumers</p>
        </div>
    
        <div class="logoIMG">
            <img src="Green.img/farmers market.webp" height="800" width="900">
        </div>
        
        <div class="circle">
            <div class="container"></div>
            <div class="container1"></div>
            <div class="container2"></div>
            <div class="container3"></div>
        </div>
    
      
        
       <div class="form">
            <form  action="" method="post">
                
        
                <label id="lbmail">Username/Email Address</label><br>
                <input type="text" id="email" class="input" name="email" placeholder="Enter Email Here" required>
                
                <label id="lbpass">Password</label>
                <input type="password" name="password" id="pass" placeholder="Enter Password" required>            
                
                <button class="btn1" type="submit" name="submit" value="SUBMIT">Sign In</button>

            </form>
            <a href="signup.php">
                <button class="btn2" type="submit" >Sign Up</button>
            </a>
            
       </div>
    </div>


   




</body>
</html>