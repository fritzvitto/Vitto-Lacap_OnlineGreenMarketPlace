<?php
    session_start();
    include("connect.php");
    if(!isset($_SESSION['valid'])){
        header("Location: register.php");
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="CSS/mystyle2.css">
    <script src="https://kit.fontawesome.com/cece6eae45.js" crossorigin="anonymous"></script>
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

    <div class="wrapper">
    <?php 
                $sql = "SELECT * FROM checkout ORDER BY id DESC LIMIT 1";
                $result1 = $conn->query($sql);
                $totalPrice = 0; 
                
                if ($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) {
                        $id = $row["id"];
                        $email1= $row["email"];
                        $item = $row["item_name"];
                        $itemPrice = $row["item_price"];
                        $delivery = $row["delivery"];
                        $quantity = $row["quantity"];
                
                        $totalPrice += $quantity * $itemPrice;
                    }
                }
                
                      
                ?>

       
        <div class="container">
        <div class="arrow">                
            <a href="return.php" >
                
                <i class="fa-solid fa-left-long fa-3x" style="color: white; margin-left: 10px;"></i>
            </a>              
        </div>
            <img id="text" src="img/logoname.png">
            <img id="question" src="img/question.png">
            <img id="bell" src="img/bell.png">
            <?php 
                $result = mysqli_query($conn, "SELECT * FROM client_form ORDER BY id DESC LIMIT 1");

                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <img src="img/<?php echo $row['image']; ?>" width="40" title="<?php echo $row['image']; ?>" style="position:absolute; left:1370px; margin-top:5px; z-index:2;  width: 40px; height: 40px;  border-radius:50%; top:5px;" >
                <?php
                }
                ?>
        </div>

            <div class="namelog">
            <h1>CHECKOUT</h1>
            </div>
              
                


            <div  class="content">
                <form> 
                    <?php 
                     $sql = "SELECT * FROM client_form";
                     $result2 = $conn->query($sql);
                 
                     
                     if ($result2->num_rows > 0) {
                     
                         while($row = $result2->fetch_assoc()) {
                             $id = $row["id"];
                             $municipality = $row["municipality"];
                             $barangay = $row["barangay"];
                             $street = $row["street"];
                             $contact = $row["contact"];
                             $gender = $row['gender'];

                      
    
                             
                         
                        
                         }
                        }
                    ?>


                 

                    <div class="left_con">

                        <div class="fullname">
                            <label for="fullName">Fullname :</label>
                            <h3 class="wrapTxt" style="text-indent: 30px; color:rgb(70, 140, 23);"><?php echo$res_Fname;" "?> <?php echo $res_Lname ?></h3>
                        </div>
                        <div class="contact">
                            <label for="contactNo">Contact Number</label>
                            <h3 style="text-indent: 30px; color:rgb(70, 140, 23);"><?php echo $contact ?></h3>
                        </div>
                    </div>
                    <div class="right_con">
                        <div class="address">
                            <label for="address">Full Address</label>
                            <h3 style="text-indent: 30px; color:rgb(70, 140, 23);"><?php echo $street ." ". $barangay . " ".$municipality ?></h3>
                        </div>
                        <div class="street">
                            <label for="shno">Sreet/Housing No.</label>
                            <h3 style="text-indent: 30px; color:rgb(70, 140, 23);"><?php echo $street ?></h3>
                        </div>
                    </div>
                    <div class="municipal">
                            <label>Email Address</label>
                            <h3 style="text-indent: 30px; color:rgb(70, 140, 23);"><?php echo $res_email ?></h3>
                        </div>
                    <input type="hidden" name="offer" id="offer">
                 

                    <input type="hidden" name="offer" id="offer">
                    
                    <a href="delivery_status.php" id="placeOrder" style="text-decoration: none; background-color: rgb(53, 128, 0); color: white;padding: 15px 60px;border: none;border-radius: 3px;cursor: pointer;position: relative;left: 400px;">Place Order</a>

                    
                    <div class="totalPrice">
                    <h2 >Total Price to Pay:</h2>
                    <h1 style="color:rgb(70, 140, 23);"><?php echo "₱".$totalPrice ?></h1>
                    </div>
                </form>   

               
               

                <div class="container2">
                    <div class="order">
                        <h2>Order Detail</h2>
                    </div>
                    <div class="orderDetail">
                       

                        <div class="itemName">
                            <h4>Item Ordered:</h4>
                            <p><?php  echo $item  ?></p>
                        </div>
                        <div class="itemPrice">
                            <h4>Price: </h4>
                            <p><?php  echo $itemPrice  ?></p>

                        </div>
                        <div class="delivery">
                            <h4>Delivery Type: </h4>
                            <p><?php  echo $delivery  ?></p>
                        </div>
                        <div class="quantity">
                        <h4>Number of Items to Order: </h4>
                            <p><?php  echo $quantity  ?></p>
                        </div>
                    
                    </div>

                    
                    
                </div>
                

                

                
         
            </div> 

            
    </div>


   
</body>
</html>
