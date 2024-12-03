<?php
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
            // echo $_SESSION['message'];
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
      }
  }
?>
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