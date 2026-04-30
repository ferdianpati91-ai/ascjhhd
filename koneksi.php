<?php
$koneksi = mysqli_connect("localhost", "root", "", "cashfund");

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>