<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="logreg.css">
</head>
<body>
    <div class="container">
        <a class="jd" href="home.html">
            <div class="jdl">
                <img class="logo" src="assets/logo.png" alt="">
                <span class="judul">Mindwell</span>
            </div>
        </a>
        <h2>Register</h2>
        <form class="form" action="auth.php" method="post">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Enter New Password" required>
            </div>
            <button type="submit" class="btn" name="register">Register</button>
            <p>Sudah punya Akun? <a href="login.php">Login</a></p>
        </form>
    </div>
    <a class="jd" href="home.html">
        <div class="desk">
            <img class="logo" src="assets/logo.png" alt="">
            <span class="judul">Mindwell</span>
            <img class="gm" src="assets/hp.png" alt="">
        </div> 
    </a>   
</body>
</html>
