<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <form action="vendor/signin.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Log In</button>
        <p>
            Don't have an account? <a href="register.php">Sign up</a>
        </p>
        <p>
            
        </p>
    </form>
    <?php
    if(isset($_COOKIE["login"])){
        echo '<a href="vendor/list.php">Site</a>';
    }
    ?>
</body>
</html>

