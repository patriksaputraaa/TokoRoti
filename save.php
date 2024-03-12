<?php
include("connection.php");

if($_POST){
    $LOCATION = "assets/images/";

    extract($_POST);
    $file = $_FILES['foto'];
    $fileName = $file['name'];
    $fileTempPath = $file['tmp_name'];
    $fileFormat = pathinfo($fileName, PATHINFO_EXTENSION);

    if(is_uploaded_file($fileTempPath)){
        $newFileName = strtolower(str_replace(' ', '', $nama_roti)) . '.' . $fileFormat;
        move_uploaded_file($fileTempPath, $LOCATION.$newFileName);
        $sql = "INSERT INTO roti (nama_roti, diameter, warna, foto, harga) VALUES ('$nama_roti', '$diameter', '$warna', '$newFileName', '$harga')";
        $conn->query($sql);
        $conn->close();
    }
    header("Location: index.php");
}
?>