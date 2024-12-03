<?php
include('connection.php');

// Check if ID is provided through GET request
if (isset($_GET['type'], $_GET['id']) && !empty($_GET['type']) && !empty($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    if ($_GET['type'] === 'user') {
        // Delete user
        $query = "DELETE FROM users WHERE id = $id";
    }elseif ($_GET['type'] === 'book') {
            // Delete book
            $query = "DELETE FROM books WHERE pid = $id";
    } else {
        // Invalid type
        echo "Invalid deletion type.";
        exit();
    }

    if (mysqli_query($conn, $query)) {
        if ($_GET['type'] === 'user') {
            header("Location: admin.php");
    }elseif ($_GET['type'] === 'book') {
        header("Location: admin.php");
    }
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}else{
    header("Location: admin.php");
    exit();
}
?>
