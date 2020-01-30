<?php
$nope=$_GET['nope'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman WHERE id ='$nope'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tanggal Kembali Pinjaman Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        					
						<div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Nama Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_peminjam" value="<?=$data['nama_peminjam']?>" class="form-control" id="inputEmail3" placeholder="Nama Peminjam" readonly="true">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="tanggal_pinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="tanggal_pinjam" value="<?=$data['tanggal_pinjam']?>" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam" readonly="true">
                            </div>
                        </div> 
						
						<div class="form-group">
                            <label for="tanggal_kembali" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-3">
                                <input type="date" name="tanggal_kembali" class="form-control" id="inputEmail3" placeholder="Tanggal Kembali">
                            </div>
                        </div> 
						
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Tanggal</button>
								<a href="?page=peminjaman&actions=tampil" class="btn btn-danger"><span class="fa fa-ban"></span> Batal</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
	$tanggal_pinjam =$_POST['tanggal_pinjam'];
		$potTgl = substr($tanggal_pinjam,8,2);
		$potBln = substr($tanggal_pinjam,5,2);
		$potThn = substr($tanggal_pinjam,0,4);
	$tanggal_kembali=$_POST['tanggal_kembali'];
		$potTglKem = substr($tanggal_kembali,8,2);
		$potBlnKem = substr($tanggal_kembali,5,2);
		$potThnKem = substr($tanggal_kembali,0,4);
	$lama_pinjam = (($potThnKem - $potThn)*360)+(($potBlnKem - $potBln)*30)+($potTglKem - $potTgl);
    //buat sql
    $sql="UPDATE tbl_peminjaman SET tanggal_kembali='$tanggal_kembali', lama_pinjam='$lama_pinjam' WHERE id='$nope'";
	$sqlArsip="UPDATE tbl_peminjaman SET status='Ada' WHERE id='$nope'";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>