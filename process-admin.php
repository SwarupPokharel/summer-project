<?php
    include 'connection.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['action']) && isset($_POST['book-title']) && isset($_POST['book-price']) && isset($_POST['book-genre']) && isset($_POST['book-description'])){
            $id = $_POST['id'];
            $name = $_POST['book-title'];
            $price = $_POST['book-price'];
            $genre = $_POST['book-genre'];
            $description = $_POST['book-description'];
            $action = $_POST['action'];
        
            // updateProduct($id, $name, $price, $genre, $description);

            function updateProduct($id, $name, $price, $genre, $description){
                global $conn;
                $query = "update books set title='$name', price='$price', description='$description', genre='$genre' where pid=$id";
                if (mysqli_query($conn, $query)) {
                    echo "<script type='text/javascript'>
                            function updateAlert(){
                                alert('Updated');
                            }
                            updateAlert();
                            window.location.href = 'admin.php';
                        </script>";
                    // header('location:admin.php');
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
                
            }
            function addProduct($name, $price, $genre, $description){
                global $conn;
                $query = "insert into books (title, price, description, genre) values ('$name', '$price', '$description', '$genre')";
                if(mysqli_query($conn, $query)){
                    echo "<script type='text/javascript'>
                            function addedAlert(){
                                alert('Added');
                            }
                            addedAlert();
                            window.location.href = 'admin.php';
                    </script>";
                }
                else{
                    echo "Error adding record: " . mysqli_error($conn);
                }
            }

            switch($action){
                case "update-books":
                    updateProduct($id, $name, $price, $genre, $description);
                    break;
                
                case "add-books":
                    addProduct($name, $price, $genre, $description);
                    break;
            }
        }
    }



?>