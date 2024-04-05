<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);

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
                    <h3>Edit Data Produk</h3>
                    <div class="box">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <select class="input-control" name="kategori" required> 
                            <option value="">--Pilih--</option>
                            <?php
                              $kategori = mysqli_query($conn, "SELECT *FROM tb_category ORDER BY category_id DESC");
                              while($r = mysqli_fetch_array($kategori)){
                                ?>  
                            <option value="<?php echo $r ['category_id']?>"><?php echo $r['category_name'] ?></option>
                              <?php } ?>
                            </select>

                            <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                            <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                            <input type="file" name="gambar" class="input-control"  required>
                            <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                            <select class="input-control" name="status">
                                <option value="">--Pilih--</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        <input type="submit" name="submit" value="Submit" class="btn">
</form>
<?php
if (isset($_POST['submit'])){

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