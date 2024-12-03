<?php
    // session_start();
    include 'navbar.php';
    if (!isset($_SESSION['name'])) {
        header("Location: register.php");
        exit();
    }
    if ($_SESSION['name'] !== 'Swarup Pokharel') {
        echo "<h1>Access Denied</h1>";
        echo "<p>You do not have permission to view this page.</p>";
        exit();
    }

    include ('connection.php');
    function bookList(){
        global $conn;
        $query = "SELECT * FROM books";
        $stmt = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($stmt)) {
            $id = $row['pid'];
            $title = $row['title'];
            $price = $row['price'];
            $image = $row['image'];
            $genre = $row['genre'];
            $des = $row['description'];
            echo "<tr>
                    <td>$id</td>
                    <td id='title'>$title</td>
                    <td  id='price'>Rs $price</td>
                    <td id='genre'>$genre</td>
                    <td  style='width: 120px;' id='image'><img src='".$image."' alt='$title' style='width:auto; height:50px;'></td>
                    <td><a href='#' class='edit-btn'
                        data-id='$id'
                        data-name='$title'
                        data-genre='$genre'
                        data-price='$price'
                        data-image = '$image',
                        data-description='$des'>Edit</a> | <a href='delete.php?type=book&id=$id' class='delete-btn'
                        onclick='return confirm(\"Are you sure you want to delete this book?\");'>Delete</a></td>
            
                </tr>";
        }
    }

    function usersList(){
        global $conn;
        $query = "SELECT * FROM users";
        $stmt = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($stmt)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $address = $row['address'];
            echo "<tr height='50px'>
                    <td id ='id'>$id</td>
                    <td id='name'>$name</td>
                    <td id='email'>$email</td>
                    <td  id='password'>$password</td>
                    <td  id='address'>$address</td>
                    <td><a href='#' class='edit-btn'
                        data-id='$id'
                        data-name='$name'
                        data-email='$email'
                        data-pass='$password'
                        data-address='$address'>Edit</a> | <a href='delete.php?type=user&id=$id' class='delete-btn'
                        onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a></td>
                </tr>";
        }
    }

    function getAllRentals($conn) {
        $rentalsQuery = "SELECT orders.order_id, orders.user_name, orders.order_date, order_items.book_title FROM orders INNER JOIN order_items ON orders.order_id = order_items.order_id";
        $result = $conn->query($rentalsQuery);
    
        $rentals = [];
        while ($row = $result->fetch_assoc()) {
            $rentals[] = $row;
        }
    
        return $rentals;
    }
    
    // Function to display rental list in table
    function rentalList($rentals) {
        foreach ($rentals as $rental) {
            echo '<tr height="50px">';
            echo '<td>' . htmlspecialchars($rental['order_id']) . '</td>';
            echo '<td>' . htmlspecialchars($rental['book_title']) . '</td>';
            echo '<td>' . htmlspecialchars($rental['user_name']) . '</td>';
            echo '<td>' . htmlspecialchars($rental['order_date']) . '</td>';
            echo '<td>' . htmlspecialchars($rental['return_date'] ?? 'Within 7 days') . '</td>'; // Assuming a return_date column, otherwise default to 'N/A'
            echo '<td><a href="#" class="edit-btn">Edit</a> | <a href="delete.php" class="delete-btn">Delete</a></td>';
            echo '</tr>';
        }
    }
    $rentals = getAllRentals($conn);

    function stockStatus(){
        global $conn;
        $query = "SELECT * FROM books";
        $stmt = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($stmt)) {
            $id = $row['pid'];
            $name = $row['title'];
            echo "<tr height='50px'>
                    <td>$id</td>
                    <td>$name</td>
                    <td>5</td>
                    <td>Available</td>
                </tr>";

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Book Renting System</title>
    <link rel="stylesheet" href="admin-css.css">
    <script type="text/javascript" src="script-admin.js"></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#manage-books">Manage Books</a></li>
                <li><a href="#manage-users">Manage Users</a></li>
                <li><a href="#manage-rentals">Manage Rentals</a></li>
            </ul>
        </div>
        <div class="main-content">
            <section id="dashboard">
                <!-- <h1>Dashboard</h1> -->
                <div class="stats">
                    <div class="stat-card">
                        <h3 id="total-books">28</h3>
                        <p>Total Books</p>
                    </div>
                    <div class="stat-card">
                        <h3 id="available-books">28</h3>
                        <p>Available Books</p>
                    </div>
                    <div class="stat-card">
                        <h3 id="rented-books">0</h3>
                        <p>Rented Books</p>
                    </div>
                    <div class="stat-card">
                        <h3 id="low-stock-books">0</h3>
                        <p>Low Stock</p>
                    </div>
                </div>
                
                <div class="card">
                    <h2>Stock Status</h2>
                    <table>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                        <?php stockStatus(); ?>
                    </table>
                </div>
            </section>
            <section id="manage-books">
                <h1>Manage Books</h1>
                <div class="card">
                    <h2>Books List</h2>
                    <table>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Genre</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <?php
                                bookList();
                            ?>
                        </tr>
                        <!-- More rows as needed -->
                    </table>
                </div>
                <div class="card">
                    <h2>Add/Edit Book</h2>
                    <form method="post" id="edit-data" action="process-admin.php">
                        <input type="hidden" id="product-id" name="id">
                        <div class="form-group">
                            <label for="book-title">Title</label>
                            <input type="text" id="book-title" name="book-title">
                        </div>
                        <div class="form-group">
                            <label for="book-price">Price</label>
                            <input type="text" id="book-price" name="book-price">
                        </div>
                        <div class="form-group">
                            <label for="book-genre">Genre</label>
                            <input type="text" id="book-genre" name="book-genre">
                        </div>
                        <div class="form-group">
                            <label for="book-description">Description</label>
                            <textarea id="book-description" name="book-description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="edit-image">Image URL:</label>
                            <input type="text" id="edit-image" name="image">
                        </div>
                        <div>
                        <label>Current Image:</label>
                            <img id="current-image" src="" alt="Current Image" width="100px" height="160px">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="updateBtn" name="action" value="update-books">Update Book</button>
                            <button type="submit" class="addBtn" name="action" value="add-books">Add Book</button>
                        </div>
                    </form>
                </div>
                
            </section>
            <section id="manage-users">
                <h1>Manage Users</h1>
                <div class="card">
                    <h2>Users List</h2>
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                        <?php
                                usersList();
                            ?>
                        </tr>
                        <!-- More rows as needed -->
                    </table>
                </div>
            </section>
            <section id="manage-rentals">
                <h1>Manage Rentals</h1>
                <div class="card">
                    <h2>Rentals List</h2>
                    <table>
                        <tr>
                            <th>Rental ID</th>
                            <th>Book Title</th>
                            <th>User Name</th>
                            <th>Rent Date</th>
                            <th>Return Date</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <?php rentalList($rentals); ?>
                        </tr>
                        <!-- More rows as needed -->
                    </table>
                </div>
            </section>
        </div>
    </div>

    
</body>
</html>
