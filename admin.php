<?php include 'koneksi.php' ?>
<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}
?>

<h2>Dashboard Admin</h2>
<p>Halo, <?= $_SESSION['name']; ?></p>

<a href="tambah.php"> Tambah Kas</a>
<br><br>
<?php
$query = mysqli_query($koneksi, "
    SELECT finance.*, users.name 
    FROM finance 
    JOIN users ON finance.idUsers = users.idUsers
    ORDER BY tanggal DESC
");

$saldo = 0;
?>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>Nama</th>
    <th>Tanggal</th>
    <th>Tipe</th>
    <th>Jumlah</th>
    <th>Keterangan</th>
    <th>Aksi</th>
</tr>

<?php while ($data = mysqli_fetch_assoc($query)) { 

    if ($data['tipe'] == 'masuk') {
        $saldo += $data['jumlah'];
    } else {
        $saldo -= $data['jumlah'];
    }
?>

<tr>
    <td><?= $data['name']; ?></td>
    <td><?= $data['tanggal']; ?></td>
    <td><?= $data['tipe']; ?></td>
    <td><?= $data['jumlah']; ?></td>
    <td><?= $data['keterangan']; ?></td>
    <td>
        <a href="edit.php?id=<?= $data['idFinance']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $data['idFinance']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>

<h3>Saldo: <?= $saldo; ?></h3>

<br>
<a href="logout.php">Logout</a>