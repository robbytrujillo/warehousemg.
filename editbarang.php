<?php
$hasil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
$data = $hasil->fetch_assoc();

$hasil = $koneksi->query("SELECT * FROM satuan_barang");
while($perdata = $hasil->fetch_assoc()) {
    $satuan[]=$perdata;
}

?>

<form action="" method="post">
    <div class="form-group">
        <label for="">Nama Barang</label>
        <input class="form-control" type="text" name="nama" id="" value="<?php echo $data['nama_barang'] ?>">
    </div>
    <div class="form-group">
        <label for="">Stok Barang</label>
        <input class="form-control" type="number" name="stok" id="" value="<?php echo $data['stok_barang'] ?>" disabled>
    </div>
    <div class="form-group">
        <label for="">Harga (RP)</label>
        <input class="form-control" type="number" name="harga" id="" value="<?php echo $data['harga_barang'] ?>">
    </div>
    <div class="form-group">
        <label for="">Ukuran Barang</label>
        <input class="form-control" type="number" name="ukuran" id="" value="<?php echo $data['ukuran_barang'] ?>">
    </div>
    <div class="form-group">
        <label for="">Satuan Barang</label>
        <select class="form-control" name="id_satuan" id="">
            <option value="">Pilih Satuan</option>

            <?php foreach($satuan as $data) {
            ?>
            <option value="<?php echo $data['id_satuan']?>">
                <?php echo $data['satuan_barang'] ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <button class="btn btn-primary" name="edit">Edit</button>
</form>

<?php
if (isset($_POST['edit'])) {
    $koneksi->query("UPDATE barang SET nama_barang = '$_POST[nama]', 
    harga_barang = '$_POST[harga]', ukuran_barang = '$_POST[ukuran]', 
    id_satuan_barang = '$_POST[id_satuan]' WHERE id_barang='$_GET[id]'");

    echo "<div class='alert alert-info'>Data Berhasil Dirubah</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";
}

?>
