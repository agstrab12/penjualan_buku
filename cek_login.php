<?php
error_reporting();
include('config.php');
$username= $_POST['username'];
$password= $_POST['password'];
$sql = "SELECT * FROM user where username='$username' AND password=md5('$password')";
$sql_user = "SELECT * FROM user where username='$username' AND password=md5('$password')";
$sql_pass = "SELECT * FROM user where username='$username' AND password=md5('$password')";
$query = mysqli_query($db, $sql);
$query_user = mysqli_query($db, $sql_user);
$query_pass = mysqli_query($db, $sql_pass);
$cek = mysqli_num_rows($query);
$cekuser = mysqli_num_rows($query_user);
$cekpass = mysqli_num_rows($query_pass);
$data = mysqli_fetch_assoc($query);
if ($cek > 0) {
    session_start();
    $_SESSION['id_user']=$data['id_user'];
    $_SESSION['nama']=$data['nama'];
    $_SESSION['username']=$data['username'];
    $_SESSION['password']=$data['password'];
    $_SESSION['level']=$data['level'];
        header('location:main.php');
}
else{
    if ($cekpass > 0 AND $cekuser == 0) {
        header("Location: index.php?u=$username&alert=3");
    }
    elseif ($cekpass == 0 AND $cekuser > 0) {
        header("Location: index.php?u=$username&alert=4");
    }
    elseif ($cekuser==0 AND $cekpass==0) {
        header("Location: index.php?u=$username&alert=2");
    }
}
?>