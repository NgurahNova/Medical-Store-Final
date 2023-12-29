<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>

<body>
    <!-- Form start -->
    <div class="container">
        <form method="post" action="register.php" class="form">
            <h2>Register</h2>
            <input type="text" name="email" class="box" placeholder="Enter Email/Username" />
            <input type="password" name="password" class="box" placeholder="Enter Password" />
            <input type="password" name="password-2" class="box2" placeholder="Confim Password">
            <button class="button" type="submit" id="submit" name="button">REGISTER</button>
            <a href="#">Forget Password?</a>
        </form>
        <div class="side">
            <img src="./img/people1.svg" alt="" />
        </div>
    </div>
    <footer>Copyright &copy; TokoObatWistika 2045 menuju Indonesia Maju</footer>
    <!-- Form End -->
</body>

</html>