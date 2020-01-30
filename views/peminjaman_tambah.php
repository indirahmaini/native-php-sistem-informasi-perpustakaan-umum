<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pinjaman </h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Nama Peminjam</label>
                            <div class="col-sm-9">
								<input type="text" name="nama_peminjam"  class="form-control" id="inputEmail3" placeholder="Nama Peminjam">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                                <select name="jenis_kelamin" class="form-control">
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                    <option>-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat" placeholder="alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">No HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp"  class="form-control" id="inputEmail3" placeholder="0812-333x-xxxx">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Judul Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul_buku"  class="form-control" id="inputEmail3" placeholder="Judul Buku">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_pinjam"  class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam">
                            </div>
                        </div>
                        
						
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Peminjaman</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Peminjaman
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $nama_peminjam =$_POST['nama_peminjam'];
    $jenis_kelamin =$_POST['jenis_kelamin'];
    $alamat =$_POST['alamat'];
    $no_hp =$_POST['no_hp'];
    $judul_buku =$_POST['judul_buku'];
    $tanggal_pinjam =$_POST['tanggal_pinjam'];
    //buat sql
    $sql="INSERT INTO tbl_peminjaman VALUES ('','$nama_peminjam','$jenis_kelamin','$alamat','$no_hp','$judul_buku','$tanggal_pinjam','','')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
