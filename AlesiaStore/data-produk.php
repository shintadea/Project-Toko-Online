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
                    <h3>Data Produk</h3>
                    <div class="box">
                        <p><a><a href="tambah-produk.php">Tambah Data</a></p>
                       <table border="1" cellspacing="0" class="table">
                           <thead>
                               <tr>
                                   <th width="60px">No</th>
                                   <th>Kategori</th>
                                   <th>Nama Produk</th>
                                   <th>Harga</th>
                                   <th>Deskripsi</th>
                                   <th>Gambar</th>
                                   <th>Status</th>
                                   <th width="150px">Aksi</th>
</tr>
</thead>
<tbody>
    <?php
    $no = 1;
    $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
    while($row = mysqli_fetch_array($produk)){
    ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $row['category_name']?></td>
        <td><?php echo $row['product_name']?></td>
        <td>Rp. <?php echo number_format($row['product_price'])?></td>
        <td><?php echo $row['product_description']?></td>
        <td><img src="produk/<?php echo $row['product_image']?>" width="100px"></td>
        <td><?php echo ($row['product_status']== 0)? 'Tidak Aktif':'Aktif';?></td>
        <td>
            <a href="edit-produk.php?id=<?php echo $row['product_id']?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row ['product_id']?>" onclick="return confirm('Yakin?')">Hapus</a>

            </td>
</tr>
<?php } ?>
</tbody>
</table>
                    </div>
                </div>
            </div>
            <!---footer--->
            <footer>
                <div class="container">
                    <small>Copyright &copy; 2021 - Alesia Store.</small>
            
</body>
</html>