<?php
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='POST') {

   $response = array();
   //mendapatkan data
   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $jurusan = $_POST['jurusan'];
   $jk = $_POST['jk'];

   //Cek nim sudah terdaftar apa belum
   $sql = "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan',jk = '$jk' WHERE nim = '$nim'";
   //$check = mysqli_fetch_array(mysqli_query($con,$sql));
   
   if(mysqli_query($con,$sql)){
     $response["value"] = 1;
     $response["message"] = "Berhasil Di Perbarui";
     echo json_encode($response);
   } else { 
       $response["value"] = 0;
       $response["message"] = "Opps, Gagal Memperbarui";
       echo json_encode($response); 
   }
   // tutup database
   mysqli_close($con);
}