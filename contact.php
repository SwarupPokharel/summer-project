<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
     <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p>If you have any questions, please feel free to reach out to us. We're here to help!</p>
        <form action="submit-contact.php" method="post">
            <label for="name">Full Name</label>
            <input type="text" name="name" required>
            
            <label for="email">Email Address</label>
            <input type="email" name="email" required>
            
            <label for="subject">Subject</label>
            <input type="text" name="subject" required>
            
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <input type="submit" class="submit-button">
        </form>
        
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p>Email: <a href="mailto:swarup.pokharel.sp@gmail.com">swarup.pokharel.sp@gmail.com</a></p>
            <p>Phone: <a href="tel:+9779862191678">+977 (986) 219-1678</a></p>
            <p>Address: Suncity Chowk, Kadhaghari, Nepal</p>
        </div>
        
        <div class="social-media">
            <h2>Follow Us</h2>
            <div class="social-media-icons">
                <a href="https://www.facebook.com" target="_blank" class="fa fa-facebook-f"></a>
                <a href="https://www.twitter.com" target="_blank" class="fa fa-twitter"></a>
                <a href="https://www.youtube.com" target="_blank" class="fa fa-youtube"></a>
            </div>
        </div>
    </div>
</body>
<?php
    include 'footer.html';
?>
</html>