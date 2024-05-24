<?php
    session_start();
    include("connect.php");
   
    error_reporting(E_ALL);
    ini_set('display_errors', 1);



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
        $query = mysqli_query($conn, "SELECT * FROM checkout");
        $data = array();


        while($row = mysqli_fetch_assoc($query)) {
    $id = $row["id"];
    $email1= $row["email"];
    $item = $row["item_name"];
    $itemPrice = $row["item_price"];
    $delivery = $row["delivery"];
    $quantity = $row["quantity"];
    $totalPriceForItem = $quantity * $itemPrice;

    $data[] = array(
        'id'=>$id,
        'email' => $email1,
        'item' => $item,
        'itemPrice' => $itemPrice,
        'delivery' => $delivery,
        'quantity' => $quantity,
        'totalPrice' => $totalPriceForItem
    );
}

$_SESSION['checkout_data'] = $data;





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

   
    <div class="transacCon">
            <div class="transHeader">
                <h1>My Purchases</h1>
            </div>
            <div class="transacCard">
                <div class="orderCard">
                <i class="fa-solid fa-bag-shopping fa-2x"></i>
                    <h3 style="text-indent: 10px;">Order to Pay</h3>

                    
            </div>  

            <div class="orderRecord">
            <?php 
          

            
        
            
            
        
                

                if (isset($_SESSION['checkout_data'])) {
                    foreach ($_SESSION['checkout_data'] as $row) {
                        echo "<div class='orderInfo'>";
                        echo "<div class='oderTitle'>";
                        echo " <i class='fa-solid fa-car'></i>";
                        echo " "." <h3>Order is on the way...</h3> <br>";
                        echo "</div>";
                        echo "<form method='POST' action=''>";
                        echo "<br><input type='hidden' name='id' value='{$row['id']}'>";
                        echo "Item: {$row['item']}<br>";
                        echo "Item Price: {$row['itemPrice']}<br>";
                        echo "Delivery: {$row['delivery']}<br>";
                        echo "Quantity: {$row['quantity']}<br>";
                        echo "Total Price: {$row['totalPrice']}<br><br>";
                        echo "<button type='submit' name='submit' class='myButton'>Order Received</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                }
                
             

             
               

if (isset($_POST['item'], $_POST['price'], $_POST['delivery'], $_POST['quantity'], $_POST['totalPrice'])) {
  
    $data = array(
        'item' => $_POST['item'],
        'price' => $_POST['price'],
        'delivery' => $_POST['delivery'],
        'quantity' => $_POST['quantity'],
        'totalPrice' => $_POST['totalPrice']
    );
    
    
    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = array();
    }
    

    $_SESSION['data'][] = $data;
}


if (isset($_SESSION['data'])) {
    foreach ($_SESSION['data'] as $index => $order) {
        echo "<div class='orderInfo'>";
        echo "<div class='orderTitle'>";
        echo "<i class='fa-solid fa-car'></i>";
        echo "<h3>Order is on the way...</h3> <br>";
        echo "</div>";
        echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
        echo "<input type='hidden' name='index' value='$index' />"; 
        echo "Item: {$order['item']}<br>";
        echo "Price: {$order['price']}<br>";
        echo "Delivery: {$order['delivery']}<br>";
        echo "Quantity: {$order['quantity']}<br>";
        echo "Total Price: {$order['totalPrice']}<br>";
        echo "<button type='submit' name='confirmDelete' class='myButton'>Order Received</button>";
        echo "</form>";
        echo "</div>";
    }
}


if (isset($_POST['confirmDelete'], $_POST['index'])) {
   
    $index_to_delete = $_POST['index'];
    
  
    if (isset($_SESSION['data'][$index_to_delete])) {
        unset($_SESSION['data'][$index_to_delete]);
    }
    
    
    echo "<script>window.location.href='delivery_status.php'; </script>;";
    
}

     
                if (isset($_POST['submit'])) {
                    if (isset($_POST['id'])) {
                        $id_to_delete = $_POST['id'];
                        $stmt = $conn->prepare("DELETE FROM checkout WHERE id = ?");
                        $stmt->bind_param("i", $id_to_delete);
                
                        if ($stmt->execute()) {
                            echo "<script> alert('Thank you for Ordering to our Store!'); window.location.href='delivery_status.php'; </script>;";
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                    }
                }
              
                
                
             ?>

            </div>

            
                
        </div>     
    </div>
</body>
</html>
