<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | register</title>
    <link rel="stylesheet" href="./css/login.css">
</head>


<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Login</header>
            <form action="verification.php" method="POST">
                <div style="display: flex; justify-content : center">
                    <?php
                    /*if (isset($_GET['message']) && $_GET['message'] === 'incorrect') {
                        echo '<div class="alert alert-primary" role="alert">
                Identifiant incorrect
              </div>';
                    }*/
                    ?>
                </div>
                <input type="text" placeholder="Entrer votre email" name="mail">
                <input type="password" placeholder="Entrer votre mot de passe" name="passe">
                <input type="submit" class="button" value="Login">
            </form>
            <div class="signup">
                <span class="signup">pas encore de compte?
                    <a href="register.php">Signup</label>
                </span>
            </div>
        </div>
    </div>
</body>

</html>