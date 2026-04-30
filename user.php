<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit;
}
?>

<h2>Dashboard User</h2>
<p>Halo, <?= $_SESSION['name']; ?></p>
<a href="logout.php">Logout</a>