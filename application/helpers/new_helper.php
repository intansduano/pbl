<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require('qrcode/qrlib.php');

function slug_seo($text){
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text)){
        return 'n-a';
    }
    
    return $text;
}

// tanggal indonesia
function tanggal($tanggal){
    $dateTimeString = $tanggal;
    $dateTime = new DateTime($dateTimeString);
    $newFormat = $dateTime->format('j F Y, g:i A'); // Tambahkan 'a' untuk menampilkan AM atau PM
    return $newFormat;
}

function formatTanggal($date){
  $pecah = explode('-', $date);
  return $pecah[2].'-'.$pecah[1].'-'.$pecah[0];
}

function rupiah($angka){
    $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
    return $hasil_rupiah;
}

function qrCode($text){
    QRcode::png($text,false,QR_ECLEVEL_H,5,10);
}

function deleteImage($address, $filename) {
    $imagePath = FCPATH . $address . $filename;

    if (file_exists($imagePath)) {
        unlink($imagePath);
        return true;
    } else {
        return false;
    }
}

function isSessionDeclared($sessionName) {
    return isset($_SESSION[$sessionName]);
}



?>