<?php
if (!isset($_GET['url'])) {
    die('URL tidak ditemukan!');
}

$url = $_GET['url'];

// Ambil nama file dari URL
$fileName = basename(parse_url($url, PHP_URL_PATH));

// Ambil isi file
$image = @file_get_contents($url);

if ($image === false) {
    die('Gagal mengambil gambar.');
}

// Set Header buat download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($image));

// Output file
echo $image;
exit;
?>
