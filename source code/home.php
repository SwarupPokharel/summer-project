<?php
    include('connection.php');
    include('cartFunction.php');
       
    function homeBooks(){
      global $conn;
      $query = "select * from books order by rand() limit 4";
      $res = mysqli_query($conn, $query);
      if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
          $pid = $row['pid'];
          $title = $row['title'];
          $img = $row['image'];
          $price = $row['price'];
          echo "<div class='collection-col'>
              <img src='$img' alt='$title'>
              <a href='productdetails.php?pid=$pid'>View</a>
              <div class='title'>$title</div>
              <div class='price'>$price</div>
              <form method='POST' action=''  class='add-to-cart'>
                <input type='hidden' name='product_id' value='".$row['pid']."'>
                  <input type='hidden' name='product_title' value='".$row['title']."'>
                  <input type='hidden' name='product_image' value='".$row['image']."'>
                  <input type='hidden' name='product_price' value='".$row['price']."'>
                <button type='submit' class='btn' name='cart-button'>Add to Cart</button>
              </form>
            </div>";
        }
      }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="home-css.css">
      <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    </head>
<body>
    <?php
      include 'navbar.php';
    ?>
    <div>
      <div class="image">
        <p>"There Is More Treasure In Books Than In All The Pirate's Loot On Treasure Island."<br> - Walt Disney</p>
        <a href="shop.php">SHOP NOW</a>
      </div>
      <section class="collection">
        <h1>Collection</h1>

        <div class="row">
          <?php
            homeBooks();
          ?>
        </div>
      </section>
    </div>
    <?php
      include 'footer.html';
    ?>
</body>
</html>
