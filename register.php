<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Page</title>
    <link rel="stylesheet" href="style-register.css">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="container">
        <div class="login-signup-container">
            <div id="form-container">
                <div id="login-form" class="form">
                    <h2>Welcome User</h2>
                    <h3>Login</h3>
                    
                    <form action="login-validation.php" method="post" id="login-form">
                        <label class="text">Email</label>
                        <input type="text" name="email" class="form-box"><br>
                        <label class="text">Password</label>
                        <input type="password" name="password" class="form-box"><br>
                        <div class="buttons">
                            <input type="submit" value="Log In" class="btn">
                        </div>
                    </form>
                    <p>Don't have an account? <a href="#" onclick="toggleForms(); return false;">Sign up</a></p>
                </div>
                
                <div id="signup-form" class="form" style="display: none;">
                    <h2>Welcome</h2>
                    <h3>Sign up</h3>
                    <form action="reg-validation.php" method="post" id="signup-form">
                        <label class="text">Name</label>
                        <input type="text" name="username" class="form-box"><br>
                        <label class="text">Email</label>
                        <input type="text" name="email" class="form-box"><br>
                        <label class="text">Password</label>
                        <input type="password" name="password" class="form-box"><br>
                        <label class="text">Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-box"><br>
                        <label class="text">Address</label>
                        <input type="text" name="address" class="form-box"><br>
                        <div class="buttons">
                            <input type="submit" value="Register" class="btn">
                        </div>
                    </form>
                    <p>Already registered? <a href="#" onclick="toggleForms(); return false;">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleForms() {
            var loginForm = document.getElementById('login-form');
            var signupForm = document.getElementById('signup-form');
            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
            } else {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            }
        }
    </script>
</body>
<?php
    include 'footer.html';
?>
</html>
