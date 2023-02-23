<h2>Tambah Barang</h2>
<?php
$hasil = $koneksi -> query("SELECT * FROM satuan_barang");
    while($data = $hasil->fetch_assoc()) {
        $datasatuan[] = $data;
    }
?>


<form action="" method="post">
    <div class="form-group">
        <label for="">Nama Barang</label>
        <input class="form-control" type="text" name="nama" id="">
    </div>
    <div class="form-group">
        <label for="">Stok Barang</label>
        <input class="form-control" type="number" name="stok" id="">
    </div>
    <div class="form-group">
        <label for="">Harga (RP)</label>
        <input class="form-control" type="number" name="harga" id="">
    </div>
    <div class="form-group">
        <label for="">Ukuran Barang</label>
        <input class="form-control" type="number" name="ukuran" id="">
    </div>
    <div class="form-group">
        <label for="">Satuan Barang</label>
        <select class="form-control" name="id_satuan" id="">
            <option value="">Pilih Satuan</option>
            <?php foreach($datasatuan as $data) {
            ?>
            <option value="<?php echo $data['id_satuan']?>">
                <?php echo $data['satuan_barang'] ?>
        </option>
            <?php } ?>
        </select>
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
</form>

<?php
if (isset($_POST['kirim'])) {
    $koneksi->query("INSERT INTO barang (nama_barang, stok_barang, ukuran_barang, 
    id_satuan_barang, harga_barang) VALUES ('$_POST[nama]','$_POST[stok]', 
    '$_POST[ukuran]', '$_POST[id_satuan]', '$_POST[harga]')");

echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";

}




?>
