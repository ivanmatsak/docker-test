<?php
    session_start();

    if (isset($_SESSION['authorization_message'])) {
        echo '<p class="msg">' . $_SESSION['authorization_message'] . '</p>';
        ?>
        <ul >
    <li ><a href="numbers.php">Available numbers</a></li>
    <li ><a href="clients.php">Clients</a></li>
    <li ><a href="services.php">Company services</a></li>
    <li ><a href="region.php">Region</a></li>
    <li ><a href="state.php">State of number</a></li>
</ul>
        <?
    }
?>

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


<p>
    <form action="exit.php" method="POST">
        <button type="submit">Exit</button>
    </form>

</p>