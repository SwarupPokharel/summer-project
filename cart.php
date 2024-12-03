
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Cart</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="cart-text"><h1>Cart</h1></div>
    <?php if (!empty($_SESSION['cart'])): ?>
    <div class="content">
            <div class="cart-container">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="orders.php" method="post" id="cart-form">
                            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                            <tr>
                                <td class="product-info">
                                    <a href="#" class="remove">×</a>
                                </td>
                                <td class="product-image">
                                    <img src="<?php echo $item['image']; ?>" alt="Product Image" width="100px" height="160px;">
                                </td>
                                <td class="product-title">
                                    <span class="product-name"><?php echo $item['title']; ?></span>
                                    <input type="hidden" name="books[<?php echo $index; ?>][title]" value="<?php echo $item['title']; ?>">
                                </td>
                                <td class="product-price">
                                    Rs <?php echo $item['price']; ?><input type="hidden" class="productPrice" value="<?php echo $item['price']; ?>">
                                    <input type="hidden" name="books[<?php echo $index; ?>][price]" value="<?php echo $item['price']; ?>">
                                </td>
                            </tr>
                            <!-- <hr class="divider"> -->
                            <?php endforeach; ?>
                            <input type="hidden" id="removeIndex" name="removeIndex" value="">
                        </tbody>
                    </table>
                </div>
            
            <div class="cart-total">
                <h1>Cart Totals</h1>
                <div class="total-div">
                    <div class="subtotal">
                        <div><h3>Subtotal</h3></div>
                        <div><h4 class="total"></h4></div>
                    </div>
                    <hr class="divider" style="width:100%; text-align:left; margin-left:0">
                    <div class="address">
                        <div><h3>Address</h3></div>
                        <?php if(isset($_SESSION['id'])): ?>
                        <div><h4><?php echo $_SESSION['address']; ?></h4></div>    
                        <?php else: ?>
                        <div><h4>N/A</h4></div>    
                        <?php endif; ?>
                    </div>
                    <hr class="divider" style="width:100%; text-align:left; margin-left:0">
                    <input type="hidden" name="subtotal" id="subtotal" value="">
                    
                    <input href="orders.php" type="submit" class="checkout-btn">
                </div>
                </form>
            </div>
    </div>
        <?php else: ?>
            <div class="cart-message">Your cart is empty.</div>
        <?php endif; ?>
<?php 
    include 'footer.html'; 
?>
</body>
</html>
<script>
    var price = document.getElementsByClassName('productPrice');
    var total = 0;
        for(i=0; i<price.length;i++){
            total +=parseInt(price[i].value);
        }
        var totalElement = document.querySelector('.total');
        totalElement.innerHTML = 'Rs. ' + total;

        var subtotalInput = document.getElementById('subtotal');
        subtotalInput.value = total;
        
        document.querySelectorAll('.remove').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();
            const row = event.target.closest('tr');
            const index = row.getAttribute('data-index');
            document.getElementById('removeIndex').value = index;
            document.getElementById('cartForm').submit();
        });
    });
</script>