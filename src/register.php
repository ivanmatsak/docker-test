<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <form action="vendor/signup.php" method="POST">
        <label>Login</label>
        <input type="text" name="login" placeholder="Login">
        <p>
            <?php
            if (isset($_SESSION['login_error_message'])){
                echo '<p class="msg">'. $_SESSION['login_error_message']. '</p>';
            }
            unset($_SESSION['login_error_message']);
            ?>
            <?php
            if (isset($_SESSION['login_not_unique_message'])){
                echo '<p class="msg">'. $_SESSION['login_not_unique_message']. '</p>';
            }
            unset($_SESSION['login_not_unique_message']);
            ?>
        </p>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <p>
            <?php
            if (isset($_SESSION['password_error_message'])){
                echo '<p class="msg">'. $_SESSION['password_error_message']. '</p>';
            }
            unset($_SESSION['password_error_message']);
            ?>
        </p>
        <label>Confirm password</label>
        <input type="password"  name="password_confirm" placeholder="Confirm password">
        <p>
            <?php
            if (isset($_SESSION['password_confirm_error_message'])){
                echo '<p class="msg">'. $_SESSION['password_confirm_error_message']. '</p>';
            }
            unset($_SESSION['password_confirm_error_message']);
            ?>
        </p>
        <label>E-mail</label>
        <input type="text" name="email" placeholder="E-mail">
        <p>
            <?php
            if (isset($_SESSION['email_error_message'])){
                echo '<p class="msg">'. $_SESSION['email_error_message']. '</p>';
            }
            unset($_SESSION['email_error_message']);
            ?>
            <?php
            if (isset($_SESSION['email_not_unique_message'])){
                echo '<p class="msg">'. $_SESSION['email_not_unique_message']. '</p>';
            }
            unset($_SESSION['email_not_unique_message']);
            ?>
        </p>
        <label>Name</label>
        <input type="text" name="name" placeholder="Name">
        <p>
            <?php
            if (isset($_SESSION['name_error_message'])){
                echo '<p class="msg">'. $_SESSION['name_error_message']. '</p>';
            }
            unset($_SESSION['name_error_message']);
            ?>
        </p>
        <button type="submit">Register</button>
        <p>
            Already have an account? <a href="index.php">Log in</a>
        </p>
        <p>
            <?php
                if (isset($_SESSION['message'])){
                    echo '<p class="msg">'. $_SESSION['message']. '</p>';
                }
                unset($_SESSION['message']);
            ?>
        </p>
    </form>
</body>
</html>
