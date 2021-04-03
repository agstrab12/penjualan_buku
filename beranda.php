<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card ">
    <div class="card card-statistics bs">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-cube text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Pendapatan</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">
              <?php
              include 'config.php';
              $bln = date('m');
              $thn = date('Y');
              $query_total = mysqli_query($db, "SELECT SUM(total) as total FROM transaksi WHERE month(tgl) = '$bln' AND year(tgl) = '$thn'");
              $data_total = mysqli_fetch_array($query_total);
               echo "Rp ".number_format($data_total['total']);
              ?>
              </h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Pendapatan /bulan
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics bs">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
           </div>
          <div class="float-right">
            <p class="mb-0 text-right">Penjualan</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">
              <?php
              $query_jumlah = mysqli_query($db, "SELECT SUM(jumlah) as jumlah FROM transaksi WHERE month(tgl) = '$bln' AND year(tgl) = '$thn'");
              $data_jumlah = mysqli_fetch_array($query_jumlah);
               echo number_format($data_jumlah['jumlah']);
              ?>
              </h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Buku Terjual
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics bs">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-poll-box text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Transaksi</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">
              <?php
              $query_id = mysqli_query($db, "SELECT COUNT(id_transaksi) as id FROM transaksi WHERE month(tgl) = '05' AND year(tgl) = '$thn'");
              $data_id = mysqli_fetch_array($query_id);
               echo number_format($data_id['id']);
              ?>
              </h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Transaksi /bulan
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics bs">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="mdi mdi-account-location text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Stok Buku</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">
              <?php
              $query_stok = mysqli_query($db, "SELECT SUM(stok) as stok FROM buku");
              $data_stok = mysqli_fetch_array($query_stok);
               echo number_format($data_stok['stok']);
              ?>
              </h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Buku Tersedia
        </p>
      </div>
    </div>
  </div>
</div>
<!-- end Row -->
<div class="row">
  <!-- Line Chart -->
  <div class="col-md-12 col-md-8">
    <div class="card bs mp">
      <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Grafik Penjualan</h4>
          </div>
        </div>
        <div class="panel-body">
          <canvas id="lineChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>