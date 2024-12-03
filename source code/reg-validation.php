<?php
include('connection.php');

// Retrieve form data
$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$address = $_POST['address'];
$exp1="/^[a-zA-Z]\w+/i";
$exp2="/^[a-zA-Z0-9]\w+/i";

// Validate form data
if (empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($address)) {
    echo "<script>
            function messageAlert(){
                window.location.href = 'register.php';
                alert('All fields are required.');
            }
            messageAlert();
        </script>";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
                alert('Email is not valid.');
                window.location.href = 'register.php';
            </script>";
}elseif(!preg_match($exp1, $name)){
    echo "<script>
            alert('Name pattern is not valid.');
            window.location.href = 'register.php';
        </script>";
}
elseif(!preg_match($exp2, $password)){
    echo "<script>
            alert('Password must contain at least a numeral and special character.');
            window.location.href = 'register.php';
        </script>";
} elseif ($password !== $confirmPassword) {
    echo "<script>
            alert('Confirm password should match with password.');
            window.location.href = 'register.php';
        </script>";
}
elseif(strlen($password)<8){
    echo "<script>
            alert('Password must be at least 8 characters.');
            window.location.href = 'register.php';
        </script>";
} else {
    try {
        $sql = "INSERT INTO users (name, email, password, confirm_password, address) VALUES ('$name', '$email', '$password', '$confirmPassword', '$address')";
        $stmt = mysqli_query($conn, $sql);
        if ($stmt) {
            echo "<script>
                    alert('Registered successfully.');
                    window.location.href = 'register.php';
                </script>";
        } else {
            echo "<script>
                    alert('Registration failed.');
                    window.location.href = 'register.php';
                </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close connection
$conn=null;
?>
