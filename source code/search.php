<?php
    include('connection.php');
    function getGenre(){
        global $conn;
        $query = "select * from genres";
        $res = mysqli_query($conn, $query);
        while($row=mysqli_fetch_assoc($res)){
          $genre = $row['genre_name'];
          $genre_id = $row['id'];
          $checked = isset($_GET['id']) && in_array($genre_id, $_GET['id']) ? 'checked' : '';
          echo "<label>
                  <input type='checkbox' name='id[]' onchange='this.form.submit()' value='$genre_id' $checked>$genre
                </label>";
        }
    }

    function searchedBooks(){
        if (isset($_POST['search_books'])) {
            $searchedItem = $_POST['srch'];
            global $conn;
            $query = "select * from books where title like '%$searchedItem%'";
            $res = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($res)) {
                $title = $row['title'];
                $image = $row['image'];
                $price = $row['price'];
                echo "<div class='productItems'>
                        <a href='productdetails.php?pid=".$row['pid']."'><img src='$image' style='width:100%; height:400px;'></a>
                        <h3>$title</h3>
                        <p>Rs. $price</p>
                        <button class='button-1'>Add To Cart</button>
                    </div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="navbar-css.css">
        <link rel="stylesheet" href="home-css.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    </head>

    <?php
        include 'navbar.php';
    ?>
    <h1 class="text">Our Products</h1>
    <div class="main">
      <div class="categoryPanel">
        <h2>Genre</h2>
        <div class="categoryItems">
          <form method="" action="">
            <?php
                 echo getGenre();
              ?>
          </form>
        </div>
      </div>
      
      <div class="products">
        <?php 
          searchedBooks();
        ?>
      </div>
      
    </div>
    <?php
        include 'footer.html';
    ?>
</html>