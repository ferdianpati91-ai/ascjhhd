<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color:red;">
            <?= $_SESSION['error']; ?>
        </p>
    <?php unset($_SESSION['error']);
    endif; ?>

    <form method="POST" action="prosesLogin.php">
        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>