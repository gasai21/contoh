<?php

if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $jurusan = $_POST['jurusan'];
   $jk = $_POST['jk'];

   require_once('config.php');
   //Cek nim sudah terdaftar apa belum
   $sql = "SELECT * FROM mahasiswa WHERE nim ='$nim'";
   $check = mysqli_fetch_array(mysqli_query($con,$sql));
   if(isset($check)){
     $response["value"] = 0;
     $response["message"] = "oops! nim sudah terdaftar!";
     echo json_encode($response);
   } else {
     $sql = "INSERT INTO mahasiswa (nim,nama,jurusan,jk) VALUES('$nim','$nama','$jurusan','$jk')";
     if(mysqli_query($con,$sql)) {
       $response["value"] = 1;
       $response["message"] = "Sukses mendaftar";
       echo json_encode($response);
     } else {
       $response["value"] = 0;
       $response["message"] = "oops! Coba lagi!";
       echo json_encode($response);
     }
   }
   // tutup database
   mysqli_close($con);
} else {
  $response["value"] = 0;
  $response["message"] = "oops! Coba lagi!";
  echo json_encode($response);
}