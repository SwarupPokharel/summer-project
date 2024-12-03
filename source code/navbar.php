<?php
session_set_cookie_params(0);
session_start();
$showDashboardLink = false;
if (isset($_SESSION['name']) && $_SESSION['name'] === 'Swarup Pokharel') {
    $showDashboardLink = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navbar-css.css">
  
</head>
<body>
  <div class="nav-bar">  
    <div class="links">
      <ul>
          <li><a href="home.php">HOME</a></li>
          <li><a href="shop.php">SHOP</a></li>
          <li><a href="about.php">ABOUT US</a></li>
          <li><a href="contact.php">CONTACT</a></li>
          <?php
            if($showDashboardLink){
              echo "<li><a href='admin.php'>DASHBOARD</a></li>";
          }
          ?>
      </ul>
    </div>

    <div class="name"><a href="home.php">READITOUT</a></div>

    <div class="icons">
      <form action="search.php" method="post">
        <input class="srch-box" type="search" placeholder="Search" name="srch">
        <input class="srch-btn" type="submit" name="search_books" value="Search">
      </form>

      
      <?php if (isset($_SESSION['id'])){
        $name = $_SESSION['name'];
        // $address = $_SESSION['address'];
      ?>
        <div class="user-menu">
          <div class="user-circle" onclick="toggleDropdownMenu()">
              <span><?php echo substr($name, 0, 1); ?></span> <!-- Displays the first letter of the username -->
          </div>
          <div class="dropdown-menu" id="userDropdown">
              <a href="logout.php">Logout</a>
          </div>
        </div>
      <?php }else{ ?>
        <a href="register.php" id="register">
          <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
          </svg>
        </a>
      <?php } ?>

      <div class="cart-icon">
        <a href="cart.php">
          <img src="images/shopping-cart.png" style="width:35px; height:35px;">
          <?php
            // Initialize cart count to 0
            $cartCount = 0;

            // Check if the user is logged in
            if (isset($_SESSION['name'])) {
                // User is logged in, check for cart items
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    $cartCount = count($_SESSION['cart']);
                }
            }
            elseif((isset($_SESSION['cart']) && is_array($_SESSION['cart']))){
              $cartCount = count($_SESSION['cart']);
            }
          ?>
          <span class="badge" id="cart-count"><?php echo $cartCount; ?></span>
        </a>
      </div>
    </div>
  </div>
  
</body>
</html>
<script>
    function toggleDropdownMenu() {
        var dropdown = document.getElementById("userDropdown");
        if (dropdown.style.display === "none") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }
</script>
