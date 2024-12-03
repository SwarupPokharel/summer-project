<?php
    include 'connection.php';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if(isset($name) && isset($email) && isset($subject) && isset($message)){
            $query = "insert into contact (name, email, subject, message) values ('$name', '$email', '$subject', '$message')";
            if(mysqli_query($conn, $query)){echo "<script>
                alert('Submitted.');
                window.location.href = 'contact.php';
                </script>";
            }
            else{
                echo "Error submitting: " . mysqli_error($conn);
            }
        }
    }
?>