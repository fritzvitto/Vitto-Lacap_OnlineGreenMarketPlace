<?php
    session_start();
    include("connect.php");
   
  

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market Place</title>
    <link rel="stylesheet" href="CSS/homestyle.css">
    <script src="https://kit.fontawesome.com/cece6eae45.js" crossorigin="anonymous"></script>
   

</head>
<body>
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
                    <img src="img/<?php echo $row['image']; ?>" width="40" title="<?php echo $row['image']; ?>" style="position:absolute; z-index:2;  width: 40px; height: 40px;  border-radius:50%; top:5px;" >
                <?php
                }
                ?>
                <img style="position:inherit; z-index:1; width: 30px; height: 30px; margin-bottom: 10px;" id="menuTrigger" src="img/profile.png" >
           </div>
        </div>
        </div>
    </div>
    <div class="container">
        

        <div class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="delivery_status.php">Delivery Status</a></li>
                <li><a href="myCart.php">My Green Cart</a></li>
         
            </ul>
        </div>
    </div>

    <div class="cartContainer">
        <div class="cartTitle">
        <i class="fa-solid fa-cart-shopping fa-3x"></i>
            <h1>My Cart</h1>
        </div>

        <div class="cartContainer2">
        <?php

$sql = "SELECT * FROM mycart";
$result1 = $conn->query($sql);

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $id = $row["id"];
        $email = $row["email"];
        $item = $row["item_name"];
        $itemPrice = $row["item_price"];
        $delivery = $row["delivery"];
        $quantity = $row["quantity"];

    
        $subtotal = $quantity * $itemPrice;

        echo "<div class='cartList'>";
        echo "<form action='delivery_status.php' method='post'>";
        echo "<h2>$item</h2>";
        echo "<p>Price: $itemPrice </p>";
        echo "<p>Delivery: $delivery</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>The total price is: </p>";
        echo "<h3>$subtotal</h3>"; 
        echo "<input type='hidden' name='item' value='$item'>";
        echo "<input type='hidden' name='price' value='$itemPrice'>";
        echo "<input type='hidden' name='delivery' value='$delivery'>";
        echo "<input type='hidden' name='quantity' value='$quantity'>";
        echo "<input type='hidden' name='totalPrice' value='$subtotal'>";
        echo "<input type='hidden' name='confirmDelete' value='true'>"; 
        echo "<button type='submit' name='confirmDelete' class='cartBtn'>Proceed</button>";
        echo "</form>";
        
       
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>"; // Include the item's ID
        echo "<button type='submit' name='delete' class='cartBtn1'>X</button>";
        echo "</form>";
        
        echo "</div>";
    }
} else {
    echo "No items in the cart.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id_to_delete = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM mycart WHERE id = ?");
    $stmt->bind_param("i", $id_to_delete);
    
    if ($stmt->execute()) {
        echo "Item successfully deleted.";
        echo "<script>  window.location.href='myCart.php'; </script>";

       
    } else {
        echo "Error deleting item: " . $conn->error;
    }
    $stmt->close();
}

?>







        </div>
       

    </div>

  

        
</body>
</html>
