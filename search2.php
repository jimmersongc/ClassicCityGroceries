<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classic City Groceries</title>
    <link rel="stylesheet" href="style.css">
    <img class="headerImage" src="headerImage.jpeg">
</head>
<body>
    <nav id="nav_menu">
        <ul>
            <li><a href="home.php" id="home" >Classic City Groceries</a></li>
            <li><a href="cart_view.php" id="cart" > My Cart</a> </li>
            <li><a href="registration.php" id="signup"> Sign Up</a> </li>
            <li><a href="logout.php" id="logout"> Logout </a> </li>
            <li><a href="login.php" id="login"> Login </a> </li>
            <li><a href="aboutus.html" id="about">About Us</a></li>
            <li><a href="search2.php" id="search">Search</a></li>
        </ul>
    </nav>
    <main>
        <br><br><br>
        <form method="post">
            <label> Search </label>
            <input type="text" name="search-bar">
            <input type="submit" name="submit">
        </form>

    </main>

</body>
</html>

<?php require_once('database.php'); 

    if(isset($_POST["submit"] )){
        $search = $_POST["search-bar"];
        $statement = $db->prepare("SELECT * FROM products WHERE type = '$search' || name = '$search'");
        $statement->execute();
        $result = $statement->fetchAll();
        if ($result) 
        {
            ?>
            <br><br><br>
            
            <?php foreach ($result as $key => $value) { ?>
                <form method="post" class="col-lg-4">
                        <img class="foodPic" src="<?php echo $result[$key]["image"] ; ?>" height="150" width="150">
                        <h3><?php echo $result[$key]["name"] ; ?></h3>
                        <p>$<?php echo $result[$key]["price"] ; ?></p>
                        <div class="add-to-cart">
                            <input type = "hidden" name="productID" value="<?php echo $result[$key]["productID"];?>">
                            <input type = "hidden" name="name" value="<?php echo $result[$key]["name"];?>">
                            <input type = "hidden" name="type" value="<?php echo $result[$key]["type"];?>">
                            <input type = "hidden" name="price" value="<?php echo $result[$key]["price"];?>">
                            <input type = "hidden" name="image" value="<?php echo $result[$key]["image"];?>">
                            <input type = "number" name="quantity" id="quantity" placeholder="Quantity" min="0";>
                            <br>
                            <button type= "submit" name="add" value="Add to Cart"> Add to Cart</button>
                        </div>
            </form>
        <?php
        }
        }
    }
        ?>


<?php 
    
    

    if (isset($_POST['add'])){
        
        $productID = $_POST['productID'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $quantity = $_POST['quantity'];

        $sql2 = "SELECT name FROM cart WHERE name = '$name';";
        $statement2 = $db->prepare($sql2);
        $statement2->execute();
        $result = $statement2->fetchAll();

        if($result){
            $sql = "UPDATE cart SET quantity = $quantity WHERE name='$name';";
            $db->query($sql);
        }
        else{
            $query = "INSERT INTO cart
                        (productID, name, type, price, image, quantity)
                        VALUES
                        (:productID, :name, :type, :price, :image, :quantity)";
            $statement = $db->prepare($query);
            $statement->bindValue(':productID', $productID);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':type', $type);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':image', $image);
            $statement->bindValue(':quantity', $quantity);
            $statement->execute();
            $statement->closeCursor();    
        }
    }  
?>




                