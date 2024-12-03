<?php
    include('connection.php');

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_POST['cart-button'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_title'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        // Check if the product is already in the cart
        $product_exists = false;
        foreach ($_SESSION['cart'] as $product) {
            if ($product['id'] === $product_id) {
                $product_exists = true;
                break;
            }
        }
        if (!$product_exists) {
            $_SESSION['cart'][] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'image' => $product_image
            ];
            $_SESSION['message'] = "Item added to cart successfully.";
        } else {
            $_SESSION['message'] = "This item is already in your cart.";
        }
    }

    function getBooks($current_page = 1, $books_per_page = 9) {
        global $conn;
        $offset = ($current_page - 1) * $books_per_page;
        $query = "SELECT * FROM books LIMIT $offset, $books_per_page";
        $res = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($res)) {
            $title = $row['title'];
            $image = $row['image'];
            $price = $row['price'];
            echo "<div class='productItems'>
                    <a href='productdetails.php?pid=".$row['pid']."'><img src='$image' style='width:100%; height:400px;'></a>
                    <h3>$title</h3>
                    <p>Rs. $price</p>
                    <form method='POST' action='' class='add-to-cart'>
                    <input type='hidden' name='product_id' value='".$row['pid']."'>
                    <input type='hidden' name='product_title' value='".$row['title']."'>
                    <input type='hidden' name='product_image' value='".$row['image']."'>
                    <input type='hidden' name='product_price' value='".$row['price']."'>
                    <button type='submit' class='btn' name='cart-button'>Add To Cart</button>
                    </form>
                </div>";
        }
    }

    function getGenre() {
        global $conn;
        $query = "select * from genres";
        $res = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($res)) {
            $genre = $row['genre_name'];
            $genre_id = $row['id'];
            $checked = isset($_GET['id']) && in_array($genre_id, $_GET['id']) ? 'checked' : '';
            echo "<label>
                    <input type='checkbox' name='id[]' onchange='this.form.submit()' value='$genre_id' $checked>$genre
                </label>";
        }
    }

    function getUniqueBooks($current_page = 1, $books_per_page = 9) {
        global $conn;
        if (isset($_GET['id'])) {
            $cat_id = $_GET['id'];
            $cat_id = array_map('intval', $cat_id);
            $genre_list = implode(',', $cat_id);
            $offset = ($current_page - 1) * $books_per_page;
            $query = "SELECT * FROM books WHERE genre_id IN ($genre_list) LIMIT $offset, $books_per_page";
            $res = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($res)) {
                $title = $row['title'];
                $image = $row['image'];
                $price = $row['price'];
                echo "<div class='productItems'>
                        <a href='productdetails.php?pid=".$row['pid']."'><img src='$image' style='width:100%; height:400px;'></a>
                        <h3>$title</h3>
                        <p>Rs. $price</p>
                        <form method='POST' action=''>
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

    function getTotalBooks() {
        global $conn;
        $query = "SELECT COUNT(*) as total FROM books";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        return $row['total'];
    }

    function getTotalUniqueBooks($genre_list) {
        global $conn;
        $query = "SELECT COUNT(*) as total FROM books WHERE genre_id IN ($genre_list)";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        return $row['total'];
    }
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home-css.css">
    <link rel="stylesheet" href="pagination.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet"> -->
</head>
<body>
<?php
    include 'navbar.php';
?>

    <h1 class="text">Our Products</h1>
    <div class="main">
        <div class="categoryPanel">
            <h2>Genre</h2>
            <div class="categoryItems">
                <form method="GET" action="shop.php">
                    <?php getGenre(); ?>
                </form>
            </div>
        </div>
        
        <div class="products">
            <?php 
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $books_per_page = 9;

                if (isset($_GET['id'])) {
                    getUniqueBooks($current_page, $books_per_page);
                } else {
                    getBooks($current_page, $books_per_page);
                }
            ?>
        </div>
    </div>

    <div class="pagination">
        <?php
            $total_books = isset($_GET['id']) ? getTotalUniqueBooks(implode(',', array_map('intval', $_GET['id']))) : getTotalBooks();
            $total_pages = ceil($total_books / $books_per_page);

            // Previous link
            if ($current_page > 1) {
                $prev_page = $current_page - 1;
                echo "<a href='shop.php?page=$prev_page' class='prev'>&#11164;</a>";
            }

            // Page numbers
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='shop.php?page=$i' class='" . ($current_page == $i ? 'active' : '') . "'>$i</a>";
            }

            // Next link
            if ($current_page < $total_pages) {
                $next_page = $current_page + 1;
                echo "<a href='shop.php?page=$next_page' class='next'>&#11166;</a>";
            }
        ?>
</div>
</body>
<?php include 'footer.html'; ?>
</html>
<script>
    // JavaScript to handle form submission and update cart icon
document.addEventListener('DOMContentLoaded', function() {
    var forms = document.querySelectorAll('.add-to-cart');

    forms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data
            var formData = new FormData(form);

            // You can optionally perform validation here

            // Simulate adding to cart by sending data to addToCart.php via POST
            fetch('addToCart.php', {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                // Handle response as needed (e.g., update cart icon)
                return response.text();
            })
            .then(function(data) {
                // Example: update cart icon
                var cartCount = document.getElementById('cart-count');
                if (cartCount) {
                    cartCount.innerText = data; // Assuming data is the updated cart count
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
        });
    });
});

</script>
