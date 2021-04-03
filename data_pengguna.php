<!-- DataTables -->
<link rel="stylesheet" href="js/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
<!-- DataTables -->
<script src="js/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 
<table id="myTable" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Id User</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>Level</th>
          <th>Tools</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'config.php';
          $sql = mysqli_query($db ,"SELECT * FROM user ORDER BY id_user DESC");
          $no = 1;
          while ($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['id_user']; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['username']; ?></td>
          <td><?php echo $data['password']; ?></td>
          <td><?php echo $data['level']; ?></td>
          <td>
            <a href="reset_pengguna.php?id=<?php echo $data['id_user']; ?>" class="btn btn-warning" title="Reset" onclick="return confirm('Anda yakin ingin mereset pengguna <?php echo $data['nama']; ?> Password menjadi 12345678?');" data-id="<?php echo $data['id_user']; ?>">
              <i class="fa fa-refresh"></i>
            </a>
            <a href="hapus_pengguna.php?id=<?php echo $data['id_user']; ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus pengguna <?php echo $data['nama']; ?> ?');"><i class="fa fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
          <th>No</th>
          <th>Id User</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>Level</th>
          <th>Tools</th>
        </tr>
        </tfoot>
      </table>
<script>
  $(function () {
    $('#myTable').DataTable()
  })
</script>