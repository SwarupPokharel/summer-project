<!DOCTYPE html>
<html>
<head>
    <title>About Us - Book Renting System</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            line-height: 1.6;
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #77aaff 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }
        header #branding {
            float: left;
        }
        header #branding h1 {
            margin: 0;
        }
        header nav {
            float: right;
            margin-top: 10px;
        }
        header .highlight, header .current a {
            color: #77aaff;
            font-weight: bold;
        }
        header a:hover {
            color: #cccccc;
            font-weight: bold;
        }
        .main {
            margin: 20px 0;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container">
        <div class="main">
            <h2>About Us</h2>
            <p>Welcome to our Book Renting System! Our platform is designed to make renting books easy and convenient. Whether you're a student looking for textbooks, a professional in need of reference materials, or just an avid reader, we've got you covered.</p>
            <h3>Our Mission</h3>
            <p>Our mission is to provide an affordable and sustainable way for people to access the books they need. By renting books instead of buying them, you can save money and help reduce the environmental impact of book production.</p>
            <h3>Features</h3>
            <ul>
                <li>Wide selection of books across various genres and categories.</li>
                <li>Easy-to-use search and filtering options to find the perfect book.</li>
                <li>Flexible rental periods to suit your needs.</li>
                <li>User-friendly interface for managing your rentals.</li>
                <li>Secure payment options and transaction processing.</li>
            </ul>
            <h3>Contact Us</h3>
            <p>If you have any questions, suggestions, or feedback, please don't hesitate to reach out to us. You can contact us through our <a href="contact.php">contact</a> page.</p>
        </div>
    </div>
</body>
<?php
    include 'footer.html';
?>
</html>
