<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Peminjaman Arsip Perbulan</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $ambilbln=$_POST['bulan'];
        $ambilthn=$_POST['tahun'];
        $bulanNama;
        if ($ambilbln==12) {
          $bulanNama="DESEMBER";
        } elseif ($ambilbln==11) {
          $bulanNama="NOVEMBER";
        } elseif ($ambilbln==10) {
          $bulanNama="OKTOBER";
        } elseif ($ambilbln==9) {
          $bulanNama="SEPTEMBER";
        } elseif ($ambilbln==8) {
          $bulanNama="AGUSTUS";
        } elseif ($ambilbln==7) {
          $bulanNama="JULI";
        } elseif ($ambilbln==6) {
          $bulanNama="JUNI";
        } elseif ($ambilbln==5) {
          $bulanNama="MEI";
        } elseif ($ambilbln==4) {
          $bulanNama="APRIL";
        } elseif ($ambilbln==3) {
          $bulanNama="MARET";
        } elseif ($ambilbln==2) {
          $bulanNama="FEBRUARI";
        } elseif ($ambilbln==1) {
          $bulanNama="JANUARI";
        }

        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel-->
                    <div class="text-center">
                        <h2>Sistem Informasi Data Peminjaman Buku <br> "Perpustakan Umum Tanjung Balai" </h2>
                        <h4> Jalan Jendral Sudirman No. 111, Bunga Tanjung, Datuk Bandar Timur, Karya<br>
                              Kota Tanjung Balai, Sumatera Utara, Kode Pos : 21332</h4>
                        <hr>
                        <h3>DATA PEMINJAMAN BUKU  <?php echo "$bulanNama-$ambilthn"; ?></h3>
                        <table class="table table-bordered table-striped table-hover">
                        <tbody>
                                <thead>
                                <tr>
                                <th>No</th><th>Nama Peminjam</th><th>Jenis Kelamin</th><th>No_Hp</th><th>Judul Buku</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Lama Pinjam</th><th>Keterangan</th>
                            </tr>
								</thead>
							<tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM tbl_peminjaman WHERE substr(tanggal_pinjam,1,7)='$ambilthn-$ambilbln'";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                               <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['nama_peminjam'] ?></td>
                                    <td><?= $data['jenis_kelamin'] ?></td>
                                    <td><?= $data['no_hp'] ?></td>
                                    <td><?= $data['judul_buku'] ?></td>
                                    <td><?= $data['tanggal_pinjam'] ?></td>
                                    <td><?= $data['tanggal_kembali'] ?></td>
                                    <td><?= $data['lama_pinjam'] ?> hari</td>
                                    <td><?= $data['keterangan'] ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
							</tbody>
                        </tbody>

                            <tfoot>
                              <tr>
                                <td colspan="12" class="text-right">
                                        <br>Tanjung Balai,  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Kabag Hukum, S.Hum<strong></u><br>
                                        NIP.102871291416712
                                    </td>
                                </tr>
							</tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
