<?php
    include ('navbar.php');
    include 'connection.php';
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
    function getOrderDetails($conn, $order_id) {
        // Query to get order details
        $orderQuery = "SELECT * FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($orderQuery);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $orderResult = $stmt->get_result();
    
        if ($orderResult->num_rows > 0) {
            // Fetch the order details
            $orderDetails = $orderResult->fetch_assoc();
    
            // Query to get order items
            $itemsQuery = "SELECT * FROM order_items WHERE order_id = ?";
            $stmt = $conn->prepare($itemsQuery);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
            $itemsResult = $stmt->get_result();
    
            // Fetch the items details
            $itemsDetails = [];
            while ($row = $itemsResult->fetch_assoc()) {
                $itemsDetails[] = $row;
            }
    
            // Combine order and items details
            $orderDetails['items'] = $itemsDetails;
    
            return $orderDetails;
        } else {
            return null;
        }
    }

    $order_id = $id; // Replace with the order ID you want to fetch
    $orderDetails = getOrderDetails($conn, $order_id);

    if ($orderDetails) {
        // Store details in variables
        $userName = $orderDetails['user_name'];
        $userAddress = $orderDetails['user_address'];
        $subtotal = $orderDetails['subtotal'];
        $orderDate = $orderDetails['order_date'];
        $orderItems = $orderDetails['items'];
    } else {
        echo "Order not found.";
    }

    function deleteOrder($conn, $order_id) {
        $deleteItemsQuery = "DELETE FROM order_items WHERE order_id = ?";
        $stmt = $conn->prepare($deleteItemsQuery);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        $deleteOrderQuery = "DELETE FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($deleteOrderQuery);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_order'])) {
        $order_id = $id;
        deleteOrder($conn, $order_id);
        echo '<script>alert("Order has been cancelled successfully."); location.href="home.php"</script>';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <link rel="stylesheet" href="invoice-css.css">
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <h1>Order Invoice</h1>
            <div class="cancel-box">
                <form action="" method="post">
                    <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order_id); ?>">
                    <input type="submit" name="cancel_order" value="Cancel Order" class="cancel-button">
                </form>
            </div>
        </div>

        <div class="user-info">
            <div>
                <strong>Username:</strong> <span id="username"><?php echo $userName; ?></span>
            </div>
            <div>
                <strong>Address:</strong> <span id="address"><?php echo $userAddress; ?></span>
            </div>
        </div>

        <div class="order-info">
            <div>
                <strong>Date Rented:</strong> <span id="date-rented"><?php echo $orderDate; ?></span>
            </div>
            <div>
                <strong>Number of Books Rented:</strong> <span id="books-rented"><?php echo count($orderItems); ?></span>
            </div>
        </div>
        <div class="order-info">
            <div>
                <strong>Deadline of Return:</strong> <span id="books-rented"><?php echo "Within 7 days."; ?></span>
            </div>
        </div>
        <div class="product-details">
            <table>
                <thead>
                    <tr>
                        <th>Book Title</th>
                        
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id="product-rows">
                <?php foreach ($orderItems as $item): ?>
                    <tr>
                        <td><?php echo $item['book_title']; ?></td>
                        <!-- <td>Author 1</td> -->
                        <td><?php echo $item['book_price'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="total-price">
            <strong>Total Price: </strong> <span id="total-price">Rs. 1756</span>
        </div>

        <div class="bottom-text">
            <p>Thank you for your order!</p>
        </div>
    </div>
    <?php include ('footer.html'); ?>
</body>
</html>
