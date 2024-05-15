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
        <h2>Login</h2>
        <form method="POST" action="">
        <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Register</button>
            <p>Tidak punya Akun? <a href="registetr.php">Register</a></p>
        </form>
        <?php
        session_start();
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        if($_GET){
            if($_GET['newpassword']===$_GET['repassword']){
                $_SESSION['email'] = $_GET['email'];
                $_SESSION['password'] = $_GET['newpassword'];
                if($_POST){
                    if ($email === $_SESSION['email'] && $password === $_SESSION['password']) {
                        header("Location: home.html");
                        exit();
                    } else {
                        echo "<script>alert('Email atau Password Anda Salah!')</script>";
                    }
                }
            }else{
                echo "<script>alert('Password Tidak Sesuai!')</script>";
            }
        }else if($_POST){
            $_SESSION['email'] = 'fiky@gmail.com';
            $_SESSION['password'] = '12345678';
            if ($email === $_SESSION['email'] && $password === $_SESSION['password']) {
                header("Location: home.html");
                exit();
            } else {
                echo "<script>alert('Email atau Password Anda Salah!')</script>";
            }
        }
        ?>
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
