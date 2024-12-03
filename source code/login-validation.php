<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (empty($email) || empty($pass)) {
        echo "<script>
                alert('All fields are required.');
                window.location.href = 'register.php'; 
              </script>";
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $row = $res->fetch_assoc();
        // Compare plain text passwords
        if ($pass === $row['password']) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['address'] = $row['address'];
            header("Location: home.php");
            exit();
        } else {
            echo "<script>
                    alert('Incorrect password.');
                    window.location.href = 'register.php'; 
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Email not found.');
                window.location.href = 'register.php'; 
              </script>";
        exit();
    }
}
?>