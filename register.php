<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | register</title>
    <!---Custom CSS File--->
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
           <div style="display: flex; justify-content : center">
           <?php
            if (isset($_GET['message']) && $_GET['message'] === 'insert_success') {
                echo '<div class="alert alert-primary" role="alert">
                enregistré avec success
              </div>';
            }
            ?>
           </div>
            <header>register</header>
            <form action="verification.php" method="POST">
                <input type="text" placeholder="Entrer votre nom" name="nom" required>
                <input type="text" placeholder="Entrer votre prenom" name="prenom" required>
                <input type="text" placeholder="Entrer votre email" name="email" required>
                <input type="password" placeholder="Entrer votre mot de passe" name="mot_de_passe" required>
                <input type="submit" class="button" value="register" name="submit">
            </form>
            <div class="signup">
                <span class="signup">vous avez déjà un compte?
                    <a href="login.php">login</label>
                </span>
            </div>
        </div>
    </div>

</body>

</html>