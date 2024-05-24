<?php 
require 'connect.php';


if(isset($_POST['submit'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    $duplicate = mysqli_query($conn, "SELECT *  FROM client_users WHERE email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Email already exist'); </script>";
}
else{
    if($password == TRUE){
        $query = "INSERT INTO client_users VALUES ('', '$firstName', '$lastName', '$email', '$password')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Sucessfully Registered'); </script>";
        header('Location: register.php');
        exit;
        
    }
    else{
        echo
        "<script> alert('Fill up a correct info'); </script>";

    }

}

    
                
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="CSS/signup.css">
    <script src="https://kit.fontawesome.com/cece6eae45.js" crossorigin="anonymous"></script>


    
</head>
<body>
    <div class="container" id="signUp">
        <div class="arrow">
            <a href="index.php"><i class="fa-solid fa-left-long fa-3x"></i></a>
        </div>
        
        <div class="logo">
            <img src="Green.img/logo.jpg" alt="img">
            <h1>Online <span class="green_txt">Green</span> <br>Market Place</h1>

        </div>

        <h1 class="title">Sign Up Form</h1>
       
            <form action="" method="post">
                <div class="leftside">

                    <label for="fName">First Name</label><br>
                    <input type="text" name="fName" id="name" placeholder="Enter FIrst Name" required><br>
                
                    <label for="lName">Last Name</label><br>
                    <input type="text" name="lName" id="lastname" placeholder="Enter Last name" required><br>

                </div>

                
                <button id="openOverlay">Confirm</button>

                <div class="overlay" id="overlay">
                    <div class="card" id="Card1">
                        <h2>Account Verified</h2>
                        <p>You're email has been successfully registered, you may now return to Sign In Form Section.</p>

                        <button type="submit" name="submit" >Continue</button>
                    </div>
                    
                </div>
              
                


                <div class="rightside">
                    <label for="email">Email Address</label><br>
                    <input type="email" name="email" id="email" placeholder="Enter Email" required><br>

                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required><br>

                   

                    <p>Already have an account?</p>
                    <a href="register.php">Login</a>
                </div>

               

            </form>  

                
            
            
        
            <script>

                function isFormFilled() {
                    var nameField = document.getElementById('name').value;
                    var lastnameField = document.getElementById('lastname').value;
                    var emailField = document.getElementById('email').value;
                    var passField = document.getElementById('password').value;
                    return nameField.trim() !== '' && lastnameField.trim() !== '' && emailField.trim() !== '' && passField.trim() !== '';
                }

                document.getElementById('openOverlay').addEventListener('click', function(e) {
                    e.preventDefault();
                    if (isFormFilled()){
                        document.getElementById('overlay').style.display = 'block';
                        
                    }else{
                        alert('Fill out the Form First')
                    }
                
                    
                });


                document.getElementById('overlay').addEventListener('click', function(e) {
                    if (e.target == this) {
                        this.style.display = 'none';
                     }
                });
            </script>

            <div class="footer">
                <ul>
                    <li><a href="https://www.apple.com"><img src="Icons/Apple.png" alt=""></a></li>
                    <li><a href="https://www.facebook.com"><img src="Icons/facebook.png" alt=""></a></li>
                    <li><a href="https://www.google.com"><img src="Icons/Gmail.png" alt=""></a></li>
                </ul>

                <div class="policy">
                    <input type="checkbox" name="notice" id="notice">
                    <label for="notice">By signing up, I agree with the <span class="green_txt">Terms of Use</span> & <span class="green_txt"> Privacy Policy</span></label>
                </div>

                
            </div>

    </div>
</body>
</html>