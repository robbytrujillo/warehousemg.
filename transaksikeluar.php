<h2>Halaman Transaksi Keluar</h2>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables <a href="index.php?halaman=tambahbarang" class="btn btn-primary">Tambah Barang</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Masuk</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor =1; ?>
                                        <?php
                                        $hasil = $koneksi->query("SELECT * FROM data_transaksi LEFT JOIN barang ON data_transaksi.id_nama_barang = barang.id_barang WHERE status_transaksi = 'keluar' ");
                                        ?>
                                        <?php
                                        while ($data = $hasil->fetch_assoc()) {

                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $data['nama_barang']; ?></td>
                                            <td><?php echo $data['qty_barang_transaksi']; ?></td>
                                            <td><?php echo $data['tanggal_transaksi']; ?></td>
                                        </tr>
                                        <?php $nomor++ ?>
                                        <?php } ?>
                                    </tbody>                              </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>