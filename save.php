<?php
extract($_POST);
echo "$nama_roti,$diameter,$warna,$harga";
$file = $_FILES['foto'];
$fileName = $file['name'];
?>