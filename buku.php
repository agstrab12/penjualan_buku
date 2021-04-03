<script type="text/javascript" src="style/jquery.js"></script> 
<script type="text/javascript" src="style/bootstrap.js"></script>
<script type="text/javascript" src="style/script_buku.js"></script>
<div id="alert">
<?php if(empty($_GET['alert'])){
  echo "";
}
else if($_GET['alert']== 2){
?>
  <div class='alert alert-success alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      <h4> <i class='icon fa fa-check-circle'></i> Sukses!</h4>
      Data buku berhasil dihapus.
    </div>
<?php
}
?>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card bs">
      <div class="card-body">
        <h2>Data Buku</h2>
        <p class="card-description">
          <a href="#" data-toggle="modal" data-target="#modal-tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </p>
        <div class="table-responsive">
          <div id="data-buku">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="modal-tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" id="form-tambah" method="post" action="simpan_buku.php">
        <div class="modal-header">
          <h4 class="modal-title">Menambahkan Data Buku</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <div class="modal-body">
            
            <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" class="form-control fc2" name="judul" placeholder="Judul" required>
            </div>
            <div class="form-group">
              <label>Penerbit</label>
              <input type="text" class="form-control fc2"  name="penerbit" placeholder="Penerbit" required>
            </div>
            <div class="form-group">
              <label>Tahun Terbit</label>
              <select class="form-control fc2"  name="thn"  required>
                <option value="" disabled selected>-- Pilih Tahun --</option>
                <?php
                $thn = date('Y');
                for ($i=$thn; $i >= ($thn-50) ; $i--) { 
                  echo "<option value='$i'>$i</option>";
                }
                ?>  
                </select>
            </div>
            <div class="form-group">
              <label>Pengarang</label>
              <input type="text" class="form-control fc2" name="pengarang" placeholder="Pengarang" required>
            </div>
            <div class="form-group">
              <label>Jumlah Halaman</label>
              <input type="text" class="form-control fc2"  name="hal" id="hal" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="Halaman" required>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control fc2"  name="harga" id="hr" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="Harga" required>
            </div>
            <div class="form-group">
              <label>Jumlah Stok</label>
              <input type="text" class="form-control fc2" name="stok" id="stok" onKeyPress="return goodchars(event,'0123456789',this)" placeholder="Stok" required>
            </div>              
                    
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
          </div>
        </form>   
      </div>
    </div>
  </div>
<div id="modal-edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form role="form" id="form-edit" method="post" action="edit_buku.php">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Buku</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <div class="modal-body">
              <div id="data-edit">
                
              </div>        
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
          </div>
        </form>   
      </div>
    </div>
  </div>