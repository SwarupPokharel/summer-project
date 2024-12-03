<?php
    include("connection.php"); 
    include('cartFunction.php');
    if(isset($_GET['pid'])){
        $id = intval(($_GET['pid']));  
        $q = "select * from books where pid= ?";
        $stmt = $conn->prepare($q);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $title = $row['title'];
            $image = $row['image'];
            $price = $row['price'];
            $gen = $row['genre'];
            $des = $row['description'];
        }else{
            echo "Product not found.";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="home-css.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    </head>
    <body>
        
    <?php
      include 'navbar.php';
    ?>

        <div class='product-page'>
            <div class='product-image'>
                <img src='<?php echo "$image"; ?>' alt='<?php echo "$title"; ?>'>
            </div>
            <div class="product-details">
                <h1><?php echo $title; ?></h1>
                <p class="price">Rs. <?php echo $price; ?></p>
                <p class="description"><?php echo $des; ?></p>
                <!-- <button type='submit' class='btn' name='cart-button'>Add to Cart</button> -->
                <form method='POST' action='' class='add-to-cart'>
                    <input type='hidden' name='product_id' value="<?php echo $id; ?>">
                    <input type='hidden' name='product_title' value="<?php echo $title; ?>">
                    <input type='hidden' name='product_image' value="<?php echo $image; ?>">
                    <input type='hidden' name='product_price' value="<?php echo $price; ?>">
                    <button type='submit' class='btn' name='cart-button'>Add to Cart</button>
              </form>
                <hr class="divider">
                <div class="text-one">
                    <span class="categories">category:</span>
                    <span class="categories-text"><?php echo $gen; ?> </span>
                </div>
            </div>
        </div>
    </body>
    <?php
      include 'footer.html';
    ?>
</html>