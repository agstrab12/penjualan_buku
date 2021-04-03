<?php

include"config.php";
$id_transaksi = $_POST['id_transaksi'];
$id_buku = $_POST['id_buku'];
$hrg = mysqli_query($db, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
$hrga = mysqli_fetch_array($hrg);
$jumlah = $_POST['qty'];
$harga = $jumlah * $hrga['harga'];
$stok = $hrga['stok'] - $jumlah;
$status = "Order";
if ($id_buku == '') {
    $data['error']['id_buku'] = 'Id_buku tidak boleh kosong';
}
if ($jumlah == '') {
    $data['error']['jumlah'] = 'Jumlah tidak boleh kosong';
}

if (empty($data['error'])) {
    
		$query = "INSERT INTO transaksi SET
										id_transaksi = '$id_transaksi',
                    tgl = NOW(),
                    waktu = NOW(),
										id_buku = '$id_buku',
										jumlah = '$jumlah',
										total = '$harga',
										status = '$status'
										";

		mysqli_query($db, $query)
		or die ("Gagal Perintah SQL".mysql_error());
		
    $up = mysqli_query($db, "UPDATE buku SET stok='$stok' WHERE id_buku = '$id_buku'");
    $data['hasil'] = 'sukses';
    
} else {
    
    $data['hasil'] = 'gagal';
}
echo json_encode($data);

?>


