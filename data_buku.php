<?php
include 'session.php';
include 'config.php';
$id = $_SESSION["id_user"];
$sql = mysqli_query($db ,"SELECT * FROM user WHERE id_user = '$id'");
$level = mysqli_fetch_array($sql);
?>
<!-- DataTables -->
<link rel="stylesheet" href="js/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
<!-- DataTables -->
<script src="js/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<table id="myTable" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Id Buku</th>
          <th>Judul</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Pengarang</th>
          <th>Halaman</th>
          <th>Harga</th>
          <th>Stok</th>
          <?php if ($level['level'] == 'Admin') {
            ?>
          <th>Tools</th>
          <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'config.php';
          $sql = mysqli_query($db ,"SELECT * FROM buku ORDER BY id_buku DESC");
          $no = 1;
          while ($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['id_buku']; ?></td>
          <td><?php echo $data['judul']; ?></td>
          <td><?php echo $data['penerbit']; ?></td>
          <td><?php echo $data['thn_terbit']; ?></td>
          <td><?php echo $data['pengarang']; ?></td>
          <td><?php echo $data['hal']; ?></td>
          <td><?php echo number_format($data['harga']); ?></td>
          <td><?php echo $data['stok']; ?></td>
          <?php if ($level['level'] == 'Admin') {
            ?>
          <td>
            <a href="#" data-toggle="modal" data-target="#modal-edit"  id="edit" data-id="<?php echo $data['id_buku']; ?>" class="btn btn-warning" title="Ubah">
              <i class="fa fa-edit"></i>
            </a>
            <a href="hapus_buku.php?id=<?php echo $data['id_buku']; ?>" onclick="return confirm('Anda yakin ingin menghapus buku <?php echo $data['judul']; ?> ?');" class="btn btn-danger" title="Hapus">
              <i class="fa fa-trash"></i>
            </a>
          </td>
          <?php } ?>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>No</th>
          <th>Id Buku</th>
          <th>Judul</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Pengarang</th>
          <th>Halaman</th>
          <th>Harga</th>
          <th>Stok</th>
          <?php if ($level['level'] == 'Admin') {
            ?>
          <th>Tools</th>
          <?php } ?>
        </tr>
        </tfoot>
      </table>

<script>
  $(function () {
    $('#myTable').DataTable()
  })
</script>