<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alesia Store</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicsand&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
        <h1><a href="dashboard.php">Alesia Store</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
            </ul>
</div>
</header>
            <!---konten--->
            <div class="section">
                <div class="container">
                    <h3>Tambah Data Kategori</h3>
                    <div class="box">
                    <form action="" method="POST" >
                        <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                        <input type="submit" name="submit" value="Submit" class="btn">
</form>
<?php
if (isset($_POST['submit'])){

    $nama = ucwords($_POST['nama']);

    $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
        null,
        '".$nama."') ");

        if($insert){
            echo '<script>alert("Tambah Data Berhasil")</script>';
            echo '<script>window.location="data-kategori.php"</script>';
        }else{
            echo 'gagal'.mysqli_error($conn);
        }

}
?>
                    </div>
                </div>
                </div>
            </div>
            <!---footer--->
            <footer>
                <div class="container">
                    <small>Copyright &copy; 2021 - Alesia Store.</small>
            
</body>
</html>