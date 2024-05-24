<?php
session_start();



include("connect.php");
if(!isset($_SESSION['valid'])){
    header("Location: register.php");
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/homestyle.css">
    <script src="https://kit.fontawesome.com/cece6eae45.js" crossorigin="anonymous"></script>
    <title>Buyer's Profile</title>
</head>
<body>

    <?php 
                
                $id = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM client_users WHERE id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Fname = $result['firstName'];
                    $res_Lname = $result['lastName'];
                    $res_email = $result['email'];
                    $res_id = $result['id'];
                }
   
                
            
    ?>

    <div class="header">
        <div class="logo">
            <h3>Online <span id="colored_txt">Green</span> Marketplace</h3>
        </div>
    </div>

    <div class="arrow">
        <a href="home.php"><i class="fa-solid fa-left-long fa-3x"></i></a>
    </div>

    <div class="container_form">

    <?php 


   if(isset($_POST['submit'])){
        $municipality = $_POST['municipality'];
        $barangay = $_POST['barangay'];
        $street = $_POST['street'];
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];  
       if (isset($_FILES['image'])) {
           $fileName = $_FILES['image']['name'];
           $fileSize = $_FILES['image']['size'];
           $tmpName = $_FILES['image']['tmp_name'];
   
           $validImageExtension = ['jpg', 'png', 'jpeg'];
           $ImageExtension = explode('.', $fileName);
           $imageExtension = strtolower(end($ImageExtension));
           if(!in_array($imageExtension, $validImageExtension)){
               echo "<script> alert('Invalid Image Extension') </script>";
           }elseif($fileSize > 10000000){
               echo "<script> alert('Image Size is Too Large') </script>";
           }else{
               $newImageName = uniqid();
               $newImageName .= '.' . $imageExtension;
   
               move_uploaded_file($tmpName, 'img/' . $newImageName);
   
             
               $query = "INSERT INTO client_form VALUES ('','$newImageName','$municipality','$barangay', '$street', '$contact', '$gender')";
                mysqli_query($conn, $query);
                echo "<script> alert('Profile Successfully Updated'); window.location.href='home.php'; </script>";
               ;
                
                }
                } else {
                    echo "<script> alert('No image file uploaded') </script>";
                }
     }

   
   

    
    
    
    ?>

        

        <div class="userProfile">
<form class="form" action="" method="post" autocomplete="off" enctype="multipart/form-data" >

        <div class="image">
                <input type="file"   name="image" id="image" accept=".jpg, .png, .jpeg" value="" onchange="displayImage1(this)" style="display: none;" required>
                <img id="blank1" src="Green.img/blankImage.jpg" alt="image"  style="width: 250px; height: 250px;"><br>
                <img id="displayImg1" style="width: 250px; height: 250px;"><br><br>
                <label for="image">Upload Image</label>
            </div>
            <label style="display: none;" for="name">Image Name:</label>
                <input type="text" name="name" style="display: none;" >


               
            </div>
        
            <div class="userInfo">

            <div class="info_title">
                <h1>My Profile</h1>
                <p>Manage and protect your Account</p>
            </div>

            <div class="buyerInfo">

           
  


<div class="nameInfo">
    <h4>Name : </h4>                        
</div>

<div class="buyerName">
  
        <label class="wrapTxt" style="color:black;"><b><?php echo$res_Fname ?></b></lablel>
        <label class="wrapTxt" style="color:black;"><b><?php echo$res_Lname ?></b></label>

</div>

<div class="nameInfo">
    <h4>Email Address: </h4>
    
</div>

<div class="buyerName">
    <div class="buyerName">
    <label class="wrapTxt" style="color:black;"><b><?php echo$res_email ?></b></lablel>

    </div>
</div>
                <hr>

                <div class="formInput">
                    
                    
                    <input type="hidden" name="form_id" value="form2">  
                   

                        <div class="formAddress">



                            <label for="municipality" style="color: black;">Municipality</label>
                            <select name="municipality" id="" required>
                                <option value="">Choose</option>
                                <option value="Gasan">Gasan</option>
                                <option value="Mogpog">Mogpog</option>
                                <option value="Boac">Boac</option>
                                <option value="Sta Cruz">Sta Cruz</option>
                                <option value="Torrijos">Torrijos</option>
                                <option value="Buenavista">Buenavista</option>
                            </select>
    
                            <label for="" style="color: black;">Barangay</label>
                            <input type="text" name="barangay" value="" placeholder="Enter Barangay Name" required>
    
                            <label for="" style="color: black;">Street</label>
                            <input type="text" name="street" value="" placeholder="Enter Street Name">
    
                            <label for="" style="color: black;">Contact no.</label>
                            <input type="text" name="contact" value="" placeholder="Enter Contact no." required>
                            

                            <label for="" style="color: black;">Gender</label>
                            <select name="gender" id="" required>
                                <option value="">Choose</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>
    
                        <div class="save">
                            <button id="confirm" name="submit" type="submit">Confirm</button>
                        </div>

                    </form>

                   

                </div>


                
            </div>

        </div>
        
       

    </div>

    <script>

        function displayImage1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('displayImg1').src = e.target.result;
                    }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


    <div class="footer"></div>

</body>
</html>