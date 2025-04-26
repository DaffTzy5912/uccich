<?php
if (!isset($_GET['url'])) {
    die('URL tidak ditemukan!');
}

$url = $_GET['url'];
$fileName = basename(parse_url($url, PHP_URL_PATH));

// Coba ambil file pakai cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirect kalau ada
$image = curl_exec($ch);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
curl_close($ch);

if ($image === false) {
    die('Gagal mengambil gambar.');
}

// Set header buat force download
header('Content-Description: File Transfer');
header('Content-Type: ' . $contentType);
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($image));

// Output file gambar
echo $image;
exit;
?>
