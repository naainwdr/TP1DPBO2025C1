<?php
// Menghubungkan dengan file kelas Petshop.php
include 'Petshop.php';

session_start();

//  INISIALISASI LINKED LIST 
// Mengecek apakah linked list sudah ada dalam session atau belum
if (!isset($_SESSION['head'])) {
    $_SESSION['head'] = null; // Jika belum ada, inisialisasi menjadi null
}
$head = $_SESSION['head']; // Mengambil linked list dari session
$nextId = isset($_SESSION['nextId']) ? $_SESSION['nextId'] : 1; // ID untuk peralatan baru

//  PROSES TAMBAH PERALATAN 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = intval($_POST['harga']); // Pastikan harga berbentuk integer

    // Proses upload foto
    $fotoNama = basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/" . $fotoNama);

    // Jika linked list masih kosong, buat elemen pertama
    if ($head === null) {
        $head = new Petshop($nextId, $nama, $kategori, $harga, $fotoNama);
    } else {
        // Tambahkan peralatan baru ke linked list
        $head->tambahPeralatan($nextId, $nama, $kategori, $harga, $fotoNama);
    }

    // Simpan perubahan ke session
    $_SESSION['head'] = $head;
    $_SESSION['nextId'] = ++$nextId; // Naikkan ID untuk entri berikutnya
}

//  PROSES HAPUS PERALATAN 
if (isset($_GET['hapus'])) {
    $hapusId = intval($_GET['hapus']);
    $head = $head ? $head->hapusPeralatan($hapusId) : null;
    $_SESSION['head'] = $head; // Perbarui session setelah penghapusan
}

//  PROSES PENCARIAN 
$cariNama = isset($_GET['cari']) ? $_GET['cari'] : ""; // Ambil kata kunci pencarian dari URL

//  PROSES UBAH PERALATAN 
// Cek apakah ada data yang ingin diubah
$ubahData = null;
if (isset($_GET['ubah'])) {
    $ubahId = intval($_GET['ubah']);
    $temp = $head;
    while ($temp !== null) {
        if ($temp->getId() == $ubahId) {
            $ubahData = $temp;
            break;
        }
        $temp = $temp->getNext();
    }
}

// Jika user menekan tombol "Simpan Perubahan"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ubah'])) {
    $ubahId = intval($_POST['ubah_id']);
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = intval($_POST['harga']);

    // Jika user mengunggah foto baru, simpan foto baru, jika tidak gunakan foto lama
    $fotoNama = $ubahData->getFoto();
    if (!empty($_FILES["foto"]["name"])) {
        $fotoNama = basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/" . $fotoNama);
    }

    // Perbarui data peralatan di linked list
    $head->ubahPeralatan($ubahId, $nama, $kategori, $harga, $fotoNama);
    $_SESSION['head'] = $head; // Simpan perubahan ke session

    // Refresh halaman setelah update
    header("Location: index.php");
    exit;
}

//  RESET DATA 
if (isset($_POST['reset'])) {
    session_destroy(); // Hapus semua data dalam session
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Petshop</title>
</head>
<body>

    <!--  FORM TAMBAH / UBAH PERALATAN  -->
    <h2><?= isset($ubahData) ? 'Ubah Peralatan' : 'Tambah Peralatan' ?></h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ubah_id" value="<?= isset($ubahData) ? $ubahData->getId() : '' ?>">

        <label>Nama Produk:</label><br>
        <input type="text" name="nama" value="<?= isset($ubahData) ? $ubahData->getNama() : '' ?>" required><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="<?= isset($ubahData) ? $ubahData->getKategori() : '' ?>" required><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= isset($ubahData) ? $ubahData->getHarga() : '' ?>" required><br>

        <label>Foto Produk:</label><br>
        <input type="file" name="foto" accept="image/*"><br>
        <?php if (isset($ubahData)): ?>
            <label>Foto Saat Ini:</label><br>
            <img src="uploads/<?= $ubahData->getFoto(); ?>" width="100"><br>
        <?php endif; ?>
        <br>

        <button type="submit" name="<?= isset($ubahData) ? 'ubah' : 'tambah' ?>">
            <?= isset($ubahData) ? 'Simpan Perubahan' : 'Tambah Peralatan' ?>
        </button>
    </form>

    <!--  FORM PENCARIAN  -->
    <h2>Cari Peralatan</h2>
    <form method="get">
        <input type="text" name="cari" value="<?= htmlspecialchars($cariNama) ?>" placeholder="Masukkan nama...">
        <button type="submit">Cari</button>
        <a href="index.php"><button type="button">Reset</button></a>
    </form>

    <!--  MENAMPILKAN DAFTAR PERALATAN  -->
    <h2>Daftar Peralatan Petshop</h2>
    <?php
    if ($head !== null) {
        $head->tampilkanPeralatan($cariNama);
    } else {
        echo "<p>Tidak ada peralatan.</p>";
    }
    ?>
    
    <!--  MENU KELUAR SESI & RESET DATA  -->
    <form method="post">
        <button type="submit" name="reset">Reset Data</button>
    </form>

</body>
</html>
