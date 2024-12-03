<?php
include('connection.php');

// Read JSON file
$json = file_get_contents('books.json');
$books = json_decode($json, true);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Books (pid, title, price, summary, description, genre, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isdssss", $id, $title, $price, $summary, $description, $genre, $image);

foreach ($books as $book) {
    $id = $book['pid'];
	$title = $book['title'];
    $price = $book['price'];
    $summary = $book['description'];
    $description = $book['description'];
    $genre = $book['genre'];
    $image = $book['image'];
    
    $stmt->execute();
}

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
