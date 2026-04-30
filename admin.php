<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}
?>

<h2>Dashboard Admin</h2>
<p>Halo, <?= $_SESSION['name']; ?></p>
<a href="logout.php">Logout</a>