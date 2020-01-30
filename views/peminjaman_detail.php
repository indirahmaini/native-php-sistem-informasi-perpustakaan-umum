<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Peminjaman Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM tbl_peminjaman WHERE id='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel-->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">ID Peminjaman</td> <td><?= $data['id'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Peminjam</td> <td><?= $data['nama_peminjam'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td> <td><?= $data['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td><td><?= $data['alamat'] ?></td>
                        </tr>
                         <tr>
                            <td>No Handphone</td><td><?= $data['no_hp'] ?></td>
                        </tr>
                         <tr>
                            <td>Judul Buku</td><td><?= $data['judul_buku'] ?></td>
                        </tr>
                         <tr>
                            <td>Tanggal Pinjam</td><td><?= $data['tanggal_pinjam'] ?></td>
                        </tr>
						<tr>
                            <td>Tanggal Kembali</td> <td><?= $data['tanggal_kembali'] ?></td>
                        </tr>
                        <tr>
                            <td>Lama Pinjam</td> <td><?= $data['lama_pinjam'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Peminjaman </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

