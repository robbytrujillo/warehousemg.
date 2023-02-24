<h2>Tambah Transaksi Masuk</h2>

<?php
$hasil = $koneksi -> query("SELECT * FROM barang");
    while($data = $hasil->fetch_assoc()) {
        $datasatuan[] = $data;
    }
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
        <label for="">Quantity Masuk</label>
        <input class="form-control" type="number" name="qty" id="">
    </div>
    <div class="form-group">
        <label for="">Tanggal</label>
        <input class="form-control" type="date" name="tanggal" id="">
        <input type="hidden" value="masuk">
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
</form>
