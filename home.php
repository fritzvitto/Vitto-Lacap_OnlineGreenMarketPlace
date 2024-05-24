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
    <title>Green Market Place</title>
    <link rel="stylesheet" href="CSS/homestyle.css">
    <script src="https://kit.fontawesome.com/cece6eae45.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    
<?php
$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM client_users WHERE id=$id ");


if ($query) {
  
    while ($result = mysqli_fetch_assoc($query)) {
        $res_Fname = $result['firstName'];
        $res_Lname = $result['lastName'];
        $res_email = $result['email'];
        $res_id = $result['id'];
    }
} else {
    
    echo "Error executing query: " . mysqli_error($conn);
    
    $res_Fname = "";
    $res_Lname = "";
    $res_email = "";
    $res_id = "";
}
?>

    
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="client_profile.php">Edit Profile</a>
        <a href="#">Settings</a>
        <a href="#">About Us</a>
      </div>
      
      <div id="main">
        <button class="openbtn" onclick="openNav()">☰</button>  
    </div>
    <div class="header">

        

        <div class="logo">
            <h3>Online <span id="colored_txt">Green</span> Marketplace</h3>

        </div>

        <div class="searchbar">
            <div class="sideIcon">
                <img src="Icons/search icon.png" alt="">
            </div>
            <input type="text" class="search-bar" placeholder="Search...">
        </div>

        <div class="rightcontainer" >

           <div class="icon1">
                <img style="width: 20px; height: 20px;" src="img/question.png" alt="">
           </div>

           <div class="icon2">
                <img style="width: 20px; height: 20px;" src="img/bell.png" alt="">
           </div>
           <div class="icon3" id="content">
           <?php 
                $result = mysqli_query($conn, "SELECT * FROM client_form ORDER BY id DESC LIMIT 1");

                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <img src="img/<?php echo $row['image']; ?>"  title="<?php echo $row['image']; ?>" style="position:absolute; z-index:2; width: 40px; height: 40px;  border-radius:50%; top:5px;" onclick="openMenu()" alt="Open Sidebar">
                <?php
                }
                ?>
                <img style="position:inherit; z-index:1; width: 30px; height: 30px; margin-bottom: 10px;" id="menuTrigger" src="img/profile.png" onclick="openMenu()" alt="Open Sidebar">
           </div>

        </div>

        <div id="myRightMenu" class="myRightMenu" style=" z-index:5; position:fixed;"> 
            <a  href="javascript:void(0)" class="closeButton" style="color:white; text-decoration:none; text-indent:20px; " onclick="closeMenu()">×</a>
                

            <div class="rightDisplay" >
            <?php 
            
                $result = mysqli_query($conn, "SELECT * FROM client_form ORDER BY id DESC LIMIT 1");

                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <img src="img/<?php echo $row['image']; ?>"  title="<?php echo $row['image']; ?>" style="border-radius:50%; width:120px; height:120px; margin-left:70px; border:7px solid green;">
                <?php
                }
                ?>


                <h2 class="wrapTxt" style="color: white; margin:10px; text-align:center;">
    <?php 
    
    if (isset($res_Fname) && isset($res_Lname)) {
        echo $res_Fname . " " . $res_Lname;
    } else {
     
        echo "User";
    }
    ?>
</h2>


            </div>
                    
                    
            <a href="logout.php" style="color:white; text-decoration:none; margin-left:20px;" >Logout</a>


        </div>

    </div>
    <div class="container">

        <div class="navbar">
            <ul>
                <li><a href="home.php" id="home">Home</a></li>
                <li><a href="delivery_status.php">Delivery Status</a></li>
                <li><a href="myCart.php">My Green Cart</a></li>
              
            </ul>
        </div>

        <div class="banner">

            <div class="leftContainer">
                <div class="description">
                    <h1>Special Product</h1>
                    <p>Check out our new product from the most popular shop of produced crops and vegetables, the most trusted <br> online seller with 90% of ratings are now realesing a newly produced crop. Get it now at lowest price! </p>
                </div>

                <div class="select_btn">
                    <button id="btn1">Get now</button>
                    <button id="btn2">Learn More</button>
                </div>
            </div>

            <div class="rightContainer">
                <img src="Green.img/banner_img.png" alt="image">
            </div>

        </div>
        <div class="nav_bar2">
            <ul>
                <li> <a href="#vegetable">Vegetables</a></li>
                <li> <a href="#milk">Milk</a></li>
                <li> <a href="#egg">Eggs</a></li>
                <li> <a href="#fruit">Fresh Fruits</a></li>
            </ul>
        </div>

        <div class="title">
            <h1 id="milk">Milk Category</h1>
        </div>


        <div class="container2">

            <div class="card1" id="card">

                <div class="imgFrame">
                    <img src="Green.img/Products/milk1.jpg" alt="image">
                </div>

                <div class="name">
                    <h2>Fresh Milk</h2>
                    <h4>₱100</h4>

                </div>
                
                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>689 Items Sold</p>
                    </div>
                </div>

               
                

            </div>

            <div class="overlay hidden" id="overlay">
                <div class="centered-card">

                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                     <p>Home / Milk-Category / <span id="bold">Fresh Milk</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                       
                        
                            <div class="imgContainer">

                                <img src="Green.img/Products/milk1.jpg" alt="">

                            </div>

                            <?php                                    
                            include "connect.php";
                            // MILK
                            $item1 = "Fresh Milk";
                            $item2 = "Skimmed Milk";
                            $item3 = "Reconstituted Milk";
                            $item4 = "Sterilized Milk";

                            // VEGETABLES
                            $item5 = "Eggplant";
                            $item6 = "Cabbage";
                            $item7 = "Carrots";
                            $item8 = "Tomatoes";

                            // EGGS
                            $item9 = "Purely Organic";
                            $item10 = "Golden Yolks";
                            $item11 = "Onzen Eggs";
                            $item12 = "eggs";

                            // FRUITS
                            $item13 = "Fresh Mango";
                            $item14 = "Pineapple";
                            $item15 = " Strawberries";
                            $item16 = " Watermelon";


                            // MILK PRICES
                            $price1 = 100;
                            $price2 = 260;
                            $price3 = 595;
                            $price4 = 350;

                            // VEGETABLES PRICES
                            $price5 = 60;
                            $price6 = 120;
                            $price7 = 200;
                            $price8 = 90;

                            // EGGS PRICES
                            $price9 = 100;
                            $price10 = 220;
                            $price11 = 150;
                            $price12 = 200;

                            // FRUITS PRICES
                            $price13 = 50;
                            $price14 = 100;
                            $price15 = 250;
                            $price16 = 150;

                            
                            $selectedItem = '';
                            $selectedPrice = '';
                            
                            if(isset($_POST['submit'])){
                                if (isset($_POST['form_id']) && $_POST['form_id'] == 'form1') {
                                    $selectedItem = $item1;
                                    $selectedPrice = $price1;
                                } elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form2') {
                                    $selectedItem = $item2;
                                    $selectedPrice = $price2;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form3') {
                                    $selectedItem = $item3;
                                    $selectedPrice = $price3;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form4') {
                                    $selectedItem = $item4;
                                    $selectedPrice = $price4;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form5') {
                                    $selectedItem = $item5;
                                    $selectedPrice = $price5;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form6') {
                                    $selectedItem = $item6;
                                    $selectedPrice = $price6;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form7') {
                                    $selectedItem = $item7;
                                    $selectedPrice = $price7;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form8') {
                                    $selectedItem = $item8;
                                    $selectedPrice = $price8;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form9') {
                                    $selectedItem = $item9;
                                    $selectedPrice = $price9;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form10') {
                                    $selectedItem = $item10;
                                    $selectedPrice = $price10;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form11') {
                                    $selectedItem = $item11;
                                    $selectedPrice = $price11;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form12') {
                                    $selectedItem = $item12;
                                    $selectedPrice = $price12;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form13') {
                                    $selectedItem = $item13;
                                    $selectedPrice = $price13;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form14') {
                                    $selectedItem = $item14;
                                    $selectedPrice = $price14;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form15') {
                                    $selectedItem = $item15;
                                    $selectedPrice = $price15;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form16') {
                                    $selectedItem = $item16;
                                    $selectedPrice = $price16;
                                }
                            
                                $delivery = $_POST['delivery']; 
                                $size = $_POST['size']; 
                                $quantity = $_POST['quantity'];
                                $comment = $_POST['comment'];
                            
                                if($selectedItem && $selectedPrice){
                                    $stmt = $conn->prepare("INSERT INTO checkout (email, item_name, item_price, delivery, quantity, comment) VALUES (?, ?, ?, ?, ?, ?)");
                                    $stmt->bind_param("ssisis", $res_email, $selectedItem, $selectedPrice, $delivery, $quantity, $comment);
                                    
                                    if ($stmt->execute()) {
                                        echo "<script> alert('Heading to Checkout'); window.location.href = 'checkout.php'; </script>";
                                        exit();
                                    } else {
                                        echo "<script> alert('Failed to store on Database'); </script>";
                                    }
                                }
                            }elseif(isset($_POST['submit1'])){
                                if (isset($_POST['form_id']) && $_POST['form_id'] == 'form1') {
                                    $selectedItem = $item1;
                                    $selectedPrice = $price1;
                                } elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form2') {
                                    $selectedItem = $item2;
                                    $selectedPrice = $price2;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form3') {
                                    $selectedItem = $item3;
                                    $selectedPrice = $price3;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form4') {
                                    $selectedItem = $item4;
                                    $selectedPrice = $price4;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form5') {
                                    $selectedItem = $item5;
                                    $selectedPrice = $price5;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form6') {
                                    $selectedItem = $item6;
                                    $selectedPrice = $price6;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form7') {
                                    $selectedItem = $item7;
                                    $selectedPrice = $price7;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form8') {
                                    $selectedItem = $item8;
                                    $selectedPrice = $price8;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form9') {
                                    $selectedItem = $item9;
                                    $selectedPrice = $price9;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form10') {
                                    $selectedItem = $item10;
                                    $selectedPrice = $price10;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form11') {
                                    $selectedItem = $item11;
                                    $selectedPrice = $price11;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form12') {
                                    $selectedItem = $item12;
                                    $selectedPrice = $price12;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form13') {
                                    $selectedItem = $item13;
                                    $selectedPrice = $price13;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form14') {
                                    $selectedItem = $item14;
                                    $selectedPrice = $price14;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form15') {
                                    $selectedItem = $item15;
                                    $selectedPrice = $price15;
                                }elseif (isset($_POST['form_id']) && $_POST['form_id'] == 'form16') {
                                    $selectedItem = $item16;
                                    $selectedPrice = $price16;
                                }
                            
                                $delivery = $_POST['delivery']; 
                                $size = $_POST['size']; 
                                $quantity = $_POST['quantity'];
                                $comment = $_POST['comment'];
                            
                                if($selectedItem && $selectedPrice){
                                    $stmt = $conn->prepare("INSERT INTO mycart (email, item_name, item_price, delivery, quantity, comment) VALUES (?, ?, ?, ?, ?, ?)");
                                    $stmt->bind_param("ssisis", $res_email, $selectedItem, $selectedPrice, $delivery, $quantity, $comment);
                                    
                                    if ($stmt->execute()) {
                                        echo "<script> alert('Successfully Added to Cart'); window.location.href = 'home.php'; </script>";
                                        exit();
                                    } else {
                                        echo "<script> alert('Failed to store on Database'); </script>";
                                    }
                                }
                            }                                
                            

                            
                            
                            ?>
                         <form action="" method="post">    
                         <input type="hidden" name="form_id" value="form1">   
                                        <div class="titleContainer">

                                            <div class="leftTitle">
                                            <h2><?php echo $item1; ?></h2>
                                               
                                                <label>Best Seller</label>
                                            </div>

                                            <div class="rightTitle">
                                                <i class="fa-solid fa-share" style="color: #000000;"></i>
                                                <p>Share</p>
                                            </div>

                                        </div>

                                        <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">3.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>689</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price1;?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">
                                            

                                            <button  type="submit" name="submit1" value="submit_form1">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form1">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
<!-- __________________________________  C A R D 2       _________________________________________  -->

            <div class="card2" id="card1">

                <div class="imgFrame">
                    <img src="Green.img/Products/milk2.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Skimmed Milk</h2>
                    <h4>₱260</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>805 Items Sold</p>
                    </div>
                </div>

            </div>

            <div class="overlay hidden" id="overlay1">
                
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Milk-Category / <span id="bold">Skimmed Milk</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/milk2.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form2">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item2; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">3.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>689</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price2;?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
            </div>

       

            <!-- __________________________________  C A R D   3      _________________________________________  -->


            <div class="card3" id="card2">

                <div class="imgFrame">
                    <img src="Green.img/Products/milk3.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Reconstituted Milk</h2>
                    <h4>₱595</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>96 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay3" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                        
                
                
                <div class="centered-card">

                        

                    <div class="cardHeader">

                        <div class="arrow">
                                
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                        
                            
                        </div>

                        

                         <p>Home / Milk-Category / <span id="bold">Reconstituted Milk</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/milk3.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form3">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item3; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">3.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>689</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price3;?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
                </div>
            </div>

            <!-- __________________________________  C A R D 4       _________________________________________  -->

            <div class="card4" id="card3">

                <div class="imgFrame">
                    <img src="Green.img/Products/milk4.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Sterilized Milk</h2>
                    <h4>₱350</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>78 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay4" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Milk-Category / <span id="bold3" >Sterilized Milk</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/milk4.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form4">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item4; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">3.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>689</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price4;?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
           
                </div>
                </div>

            </div>

           

            </div>





            <!-- <<<<<<<<--------------------------------- C    A   T    E    G   O   R   Y  2 --------------------------------->

            <!-- __________________________________        C  A  R  D    5       _________________________________________  -->

            <div class="title">
            <h1 id="vegetable">Vegetables</h1>
        </div>


            <div class="container2">

            <div class="card1" id="card4">

                <div class="imgFrame">
                    <img src="Green.img/Products/vege1.jpg" alt="image">
                </div>

                <div class="name">
                    <h2>Eggplant</h2>
                    <h4>₱60 / per kilo</h4>

                </div>
                
                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>299 Items Sold</p>
                    </div>
                </div>

               
                

            </div>

            <div class="overlay hidden" id="overlay5">
                <div class="centered-card">

                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                     <p>Home / Vegetables-Category / <span id="bold">Eggplant</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                       
                        
                            <div class="imgContainer">

                                <img src="Green.img/Products/vege1.jpg" alt="">

                            </div>
                               
                            

                          
                            
                        
                         <form action="" method="post">    
                         <input type="hidden" name="form_id" value="form5">   
                                        <div class="titleContainer">

                                            <div class="leftTitle">
                                            <h2><?php echo $item5; ?></h2>
                                               
                                              
                                            </div>

                                            <div class="rightTitle">
                                                <i class="fa-solid fa-share" style="color: #000000;"></i>
                                                <p>Share</p>
                                            </div>

                                        </div>

                                        <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">5.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>689</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price5 . "/ per kilo";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form1">Add to Cart</button>                                     
                                            <button  type="submit" name="submit" value="submit_form1">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
<!-- __________________________________  C A R D 6       _________________________________________  -->

            <div class="card2" id="card5">

                <div class="imgFrame">
                    <img src="Green.img/Products/vege2.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Cabbage</h2>
                    <h4>₱120</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>8105 Items Sold</p>
                    </div>
                </div>

            </div>

            <div class="overlay hidden" id="overlay6">
                
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Vegetable-Category / <span id="bold"> Cabbage</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/vege2.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form6">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item6; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">3.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>689</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price6 ."per / kilo";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
            </div>

       

            <!-- __________________________________  C A R D   7      _________________________________________  -->


            <div class="card3" id="card6">

                <div class="imgFrame">
                    <img src="Green.img/Products/vege3.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Carrots</h2>
                    <h4>₱200 / per kilo</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>8105 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay7" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                        
                
                
                <div class="centered-card">

                        

                    <div class="cardHeader">

                        <div class="arrow">
                                
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                        
                            
                        </div>

                        

                         <p>Home / Vegetables-Category / <span id="bold"> Carrots</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/vege3.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form7">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item7; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">4.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>8156</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price7."/ per kilo";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">
                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
                </div>
            </div>
<!-- ------------------------------------------------------  C A R D 8 ------------------------------------------------------ -->
            <div class="card4" id="card7">

                <div class="imgFrame">
                    <img src="Green.img/Products/vege5.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Tomatoes</h2>
                    <h4>₱90 / per kilo</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>904 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay8" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Vegetable-Category / <span id="bold3" > Tomatoes</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/vege5.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form8">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item8; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">3.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>613</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>904</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price8 . "/ per kilo";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
           
                </div>
                </div>

            </div>

           

            </div>

             <!-- <<<<<<<<--------------------------------- C    A   T    E    G   O   R   Y  3 --------------------------------->

            <!-- __________________________________        C  A  R  D    9       _________________________________________  -->

            <div class="title">
            <h1 id="egg">Egg Catagory</h1>
        </div>


            <div class="container2">

            <div class="card1" id="card8">

                <div class="imgFrame">
                    <img src="Green.img/Products/egg1.jpg" alt="image">
                </div>

                <div class="name">
                    <h2>Purely Organic</h2>
                    <h4>₱100 / per tray</h4>

                </div>
                
                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>599 Items Sold</p>
                    </div>
                </div>

               
                

            </div>

            <div class="overlay hidden" id="overlay9">
                <div class="centered-card">

                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                     <p>Home / Egg-Category / <span id="bold">Purely Organic</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                       
                        
                            <div class="imgContainer">

                                <img src="Green.img/Products/egg1.jpg" alt="">

                            </div>
                               
                            

                          
                            
                        
                         <form action="" method="post">    
                         <input type="hidden" name="form_id" value="form9">   
                                        <div class="titleContainer">

                                            <div class="leftTitle">
                                            <h2><?php echo $item9; ?></h2>
                                               
                                              
                                            </div>

                                            <div class="rightTitle">
                                                <i class="fa-solid fa-share" style="color: #000000;"></i>
                                                <p>Share</p>
                                            </div>

                                        </div>

                                        <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">5.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>599</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price9 . "/ per tray";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form1">Add to Cart</button>                                     
                                            <button  type="submit" name="submit" value="submit_form1">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
<!-- __________________________________  C A R D   1 0       _________________________________________  -->

            <div class="card2" id="card9">

                <div class="imgFrame">
                    <img src="Green.img/Products/egg2.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Golden Yolks</h2>
                    <h4>₱220 / per tray</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>867 Items Sold</p>
                    </div>
                </div>

            </div>

            <div class="overlay hidden" id="overlay10">
                
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Vegetable-Category / <span id="bold"> GOlden Yolks</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/egg2.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form10">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item10; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">3.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>867</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price10 ."per / tray";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
            </div>

       

            <!-- __________________________________  C A R D   1 1      _________________________________________  -->


            <div class="card3" id="card10">

                <div class="imgFrame">
                    <img src="Green.img/Products/egg3.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Onzen Eggs</h2>
                    <h4>₱150 / per tray</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>905 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay11" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                        
                
                
                <div class="centered-card">

                        

                    <div class="cardHeader">

                        <div class="arrow">
                                
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                        
                            
                        </div>

                        

                         <p>Home / Egg-Category / <span id="bold"> Onzen Eggs</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/egg3.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form11">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item11; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">2.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>905</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price11."/ per tray";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">
                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
                </div>
            </div>
<!-- ------------------------------------------------------  C A R D  1 2 ------------------------------------------------------ -->
            <div class="card4" id="card11">

                <div class="imgFrame">
                    <img src="Green.img/Products/egg4.jpg" alt="">
                </div>

                <div class="name">
                    <h2>eggs </h2>
                    <h4>₱200 / per tray</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>454 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay12" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Egg-Category / <span id="bold3" > eggs</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/egg4.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form12">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item12; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">5.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>613</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>454</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price12 . "/ per kilo";?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
           
                </div>
                </div>

            </div>

           

            </div>

             <!-- <<<<<<<<--------------------------------- C    A   T    E    G   O   R   Y     4 --------------------------------->

            <!-- __________________________________        C  A  R  D    1  3       _________________________________________  -->

            <div class="title">
            <h1 id="fruit">Fruit Catagory</h1>
        </div>


            <div class="container2">

            <div class="card1" id="card12">

                <div class="imgFrame">
                    <img src="Green.img/Products/fruit1.jpg" alt="image">
                </div>

                <div class="name">
                    <h2>Fresh Mango</h2>
                    <h4>₱50 / per kilo</h4>

                </div>
                
                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>599 Items Sold</p>
                    </div>
                </div>

               
                

            </div>

            <div class="overlay hidden" id="overlay13">
                <div class="centered-card">

                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                     <p>Home / Fruit Category / <span id="bold">Fresh Mango</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                       
                        
                            <div class="imgContainer">

                                <img src="Green.img/Products/fruit1.jpg" alt="">

                            </div>
                               
                            

                          
                            
                        
                         <form action="" method="post">    
                         <input type="hidden" name="form_id" value="form13">   
                                        <div class="titleContainer">

                                            <div class="leftTitle">
                                            <h2><?php echo $item13; ?></h2>
                                               
                                              
                                            </div>

                                            <div class="rightTitle">
                                                <i class="fa-solid fa-share" style="color: #000000;"></i>
                                                <p>Share</p>
                                            </div>

                                        </div>

                                        <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">4.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>599</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price13 ;?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form1">Add to Cart</button>                                     
                                            <button  type="submit" name="submit" value="submit_form1">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
<!-- __________________________________  C A R D   1 4       _________________________________________  -->

            <div class="card2" id="card13">

                <div class="imgFrame">
                    <img src="Green.img/Products/fruit2.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Pineapple</h2>
                    <h4>₱100 </h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>160 Items Sold</p>
                    </div>
                </div>

            </div>

            <div class="overlay hidden" id="overlay14">
                
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Fruit-Category / <span id="bold">Pineapple</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/fruit2.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form14">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item14; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">4.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>160</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price14 ;?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
            </div>

       

            <!-- __________________________________  C A R D   1 5      _________________________________________  -->


            <div class="card3" id="card14">

                <div class="imgFrame">
                    <img src="Green.img/Products/fruit3.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Strawberries</h2>
                    <h4>₱250 </h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>9205 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay15" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                        
                
                
                <div class="centered-card">

                        

                    <div class="cardHeader">

                        <div class="arrow">
                                
                            <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                        
                            
                        </div>

                        

                         <p>Home / Fruit-Category / <span id="bold"> Strawberries</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/fruit3.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form15">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item15; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">4.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>390</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>9205</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price15?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">
                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
                </div>
                </div>
            </div>
<!-- ------------------------------------------------------  C A R D  1 6 ------------------------------------------------------ -->
            <div class="card4" id="card15">

                <div class="imgFrame">
                    <img src="Green.img/Products/fruit4.jpg" alt="">
                </div>

                <div class="name">
                    <h2>Watermelon </h2>
                    <h4>₱150</h4>
                </div>

                <div class="container3">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="sold">
                        <p>954 Items Sold</p>
                    </div>
                </div>

                <div class="overlay hidden" id="overlay16" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.8); z-index: 2; cursor: pointer;">
                <div class="centered-card">
                    <div class="cardHeader">

                        <div class="arrow">
                            
                        <a href="home.php" >
                                <i class="fa-solid fa-left-long fa-3x" style="color: green; margin-left: 10px;"></i>
                        
                            </a>
                                
                            
                        </div>

                         <p>Home / Fruit-Category / <span id="bold3" > Watermelon</span></p>
                    </div>

                    <div class="formContainer">

                        <div class="leftForm">
                            <div class="imgContainer">
                            <img src="Green.img/Products/fruit4.jpg" alt="">
                            </div>

                                <form action="" method="post">
                                <input type="hidden" name="form_id" value="form16">
                                    <div class="titleContainer">

                                        <div class="leftTitle">
                                        <h2><?php echo $item16; ?></h2>
                                        
                                        
                                        </div>

                                        <div class="rightTitle">
                                            <i class="fa-solid fa-share" style="color: #000000;"></i>
                                            <p>Share</p>
                                        </div>

                                    </div>

                                    <div class="reviews">

                                            <div class="leftReview">
                                                <h3 style="font-size: 13px;">5.0</h3>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="midReview">
                                                <h5>613</h5>
                                                <p style="font-size: 13px;"> reviews</p>
                                            </div>

                                            <div class="rightReview">
                                                <h5>954</h5>
                                                <p style="font-size: 13px;"> sold</p>
                                            </div>

                                        </div>

                                        <div class="price">
                                            <h1><?php echo "₱". $price16 ;?></h1>
                                        </div>

                                    </div>

                                    <div class="rightForm">
                                       
                                        
                            
                                              
                                        
                                        <div class="right_con1">

                                           
                                                <h5>Delivery</h5>
                                                <select name="delivery" id="" required>
                                                    <option value="Pickup to Shop">Pickup to Shop</option>
                                                    <option value="Trucking Delivery">Trucking Delivery</option>
                                                    <option value="Outside Province Shipment">Outside Province Shipment</option>
                                                </select>

                                            

                                            
                                        </div>

                                        <div class="right_con2">
                                            <div class="promotion_con">

                                                <div class="con1">
                                                    <p>Mastercard - 10% Off</p>
                                                </div>

                                                <div class="con2">
                                                    <p>Buy 3 get 1</p>
                                                </div>

                                            </div>

                                           

                                            <div class="size_con">

                                                <p style="font-size:14px;">Size of Item</p>
                                                <select name="size" id="" required>
                                                        <option value="large">Large</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="small">Small</option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="right_con3" style="padding-left: 10px;">
                                            <p>Quantity</p>
                                            <input type="number" name="quantity" placeholder="Enter Quantity" style="height: 30px;">
                                        </div>

                                        <div class="right_con4">

                                            <button  type="submit" name="submit1" value="submit_form2">Add to Cart</button>
                                            <button  type="submit" name="submit" value="submit_form2">Checkout</button>

                        

                                        </div>

                                        <div class="right_con5" style="padding-left: 20px; padding-top: 5px;">
                                            <h3>Reviews</h3>
                                        </div>

                                        <div class="right_con6">

                                            <div class="star_rating">

                                            </div> 
                                            
                                            <div class="comment">
                                                <textarea name="comment" id="" rows="6" cols="40" placeholder="Enter Comment" style="resize: none; text-indent: 20px;" ></textarea>                                              
                                            </div>
                                        </div>
                        </form>
                

                                

                        </div>
           
                    </div>
           
                </div>
                </div>

            </div>

           

            </div>






        </div>
        </div>
    </div>

    <div class="footer"></div>


    <script>
   

     function openMenu() {
        document.getElementById("myRightMenu").style.width = "250px";
        document.getElementById("content").style.marginRight = "250px";
        }

        function closeMenu() {
        document.getElementById("myRightMenu").style.width = "0";
        document.getElementById("content").style.marginRight= "0";
        }

        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginRight = "250px"; 
        }

        function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight= "0"; 
        }

        document.getElementById('card').addEventListener('click', function(){
            document.getElementById('overlay').style.display = "block";
        });

        document.getElementById('card1').addEventListener('click', function(){
            document.getElementById('overlay1').style.display = "block";
        });

        document.getElementById('card2').addEventListener('click', function(){
            document.getElementById('overlay3').style.display = "block";
        });

        document.getElementById('card3').addEventListener('click', function() {
  document.getElementById('overlay4').style.display = 'block';
  
});

document.getElementById('card4').addEventListener('click', function(){
            document.getElementById('overlay5').style.display = "block";
        });

        document.getElementById('card5').addEventListener('click', function(){
            document.getElementById('overlay6').style.display = "block";
        });

        document.getElementById('card6').addEventListener('click', function(){
            document.getElementById('overlay7').style.display = "block";
        });

        document.getElementById('card7').addEventListener('click', function() {
  document.getElementById('overlay8').style.display = 'block';
});

document.getElementById('card8').addEventListener('click', function(){
            document.getElementById('overlay9').style.display = "block";
        });

        document.getElementById('card9').addEventListener('click', function(){
            document.getElementById('overlay10').style.display = "block";
        });

        document.getElementById('card10').addEventListener('click', function(){
            document.getElementById('overlay11').style.display = "block";
        });

        document.getElementById('card11').addEventListener('click', function() {
  document.getElementById('overlay12').style.display = 'block';
});

document.getElementById('card12').addEventListener('click', function(){
            document.getElementById('overlay13').style.display = "block";
        });

        document.getElementById('card13').addEventListener('click', function(){
            document.getElementById('overlay14').style.display = "block";
        });

        document.getElementById('card14').addEventListener('click', function(){
            document.getElementById('overlay15').style.display = "block";
        });

        document.getElementById('card15').addEventListener('click', function() {
  document.getElementById('overlay16').style.display = 'block';
});

$('a').click(function(event){
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 2000); 
    event.preventDefault();
});


</script>
</body>



</html>
