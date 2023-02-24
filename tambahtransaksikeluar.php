<h2>Tambah Transaksi Keluar</h2>

<?php
$hasil = $koneksi -> query("SELECT * FROM barang");
    while($data = $hasil->fetch_assoc()) {
        $datasatuan[] = $data;
    }

    $tanggal = date("Y-m-d");
?>


<form action="" method="post">
    <div class="form-group">
        <label for="">Pilih Barang</label>
        <select class="form-control" name="barang" id="">
            <option value="">Pilih Barang</option>
            <?php foreach($datasatuan as $data) {
            ?>
            <option value="<?php echo $data['id_barang']?>">
                <?php echo $data['nama_barang'] ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Quantity Keluar</label>
        <input class="form-control" type="number" name="qty" id="">
    </div>
    <div class="form-group">
        <label for="">Tanggal</label>
        <input class="form-control" type="date" name="tanggal" value="<?php echo $tanggal ?>" id="">
        <input type="hidden" value="keluar" name="status_transaksi">
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
</form>

<?php
if (isset($_POST['kirim'])) {
    $koneksi->query("INSERT INTO data_transaksi(id_nama_barang, qty_barang_transaksi, tanggal_transaksi, status_transaksi) 
    VALUES('$_POST[barang]', '$_POST[qty]', '$_POST[tanggal]', 
    '$_POST[status_transaksi]')");

    $koneksi->query("UPDATE barang SET stok_barang = stok_barang - $_POST[qty] WHERE id_barang = $_POST[barang]");

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=transaksikeluar'>";
}

?>
