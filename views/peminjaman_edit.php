<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman WHERE id='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Data Peminjaman Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                     
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">ID Peminjam</label>
                            <div class="col-sm-3">
                                <input type="text" name="id" value="<?=$data['id']?>" class="form-control" readonly="true">
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Nama Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_peminjam" value="<?=$data['nama_peminjam']?>"  class="form-control" id="inputEmail3" placeholder="Nama Peminjam">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                                 <input type="text" name="jenis_kelamin" value="<?=$data['jenis_kelamin']?>"  class="form-control" readonly="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" name="alamat" value="<?=$data['alamat']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">No HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp"  class="form-control" value="<?=$data['no_hp']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Judul Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul_buku"  class="form-control" value="<?=$data['judul_buku']?>">
                            </div>
                        </div>
						
					 <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_pinjam"  class="form-control" value="<?=$data['tanggal_pinjam']?>">
                            </div>
                        </div>
                        
						<div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_kembali"  class="form-control" value="<?=$data['tanggal_kembali']?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-4">
                                <select name="keterangan" class="form-control">
                                    <option>Sudah Dikembalikan</option>
                                    <option>Belum Dikembalikan</option>
                                    <option>-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Pinjaman</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Pinjaman
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    $id =$_POST['id'];
    $nama_peminjam =$_POST['nama_peminjam'];
    $jenis_kelamin =$_POST['jenis_kelamin'];
    $alamat =$_POST['alamat'];
    $no_hp =$_POST['no_hp'];
    $judul_buku =$_POST['judul_buku'];
	$tanggal_pinjam=$_POST['tanggal_pinjam'];
	$tanggal_kembali=$_POST['tanggal_kembali'];
    $keterangan=$_POST['keterangan'];
    //buat sql
    $sql="UPDATE tbl_peminjaman SET nama_peminjam='$nama_peminjam', 
                                    jenis_kelamin='$jenis_kelamin',
                                    alamat='$alamat',
                                    no_hp='$no_hp',
                                    judul_buku='$judul_buku',
                                    tanggal_pinjam='$tanggal_pinjam', 
                                    tanggal_kembali='$tanggal_kembali',
                                    keterangan='$keterangan' WHERE id='$id'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



