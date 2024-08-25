<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/dashboard/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <link rel="stylesheet" href="<?=base_url('assets/styles/style.css')?>"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/library/sweetalert/sweetalert2.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/styles/style/style.css');?>">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link href="<?= base_url('assets/library/datatables/css/dataTables.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/library/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/library/lightbox/css/lightbox.css') ?>">
  <link href="<?= base_url('assets/library/chartjs/chart.min.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

  <!-- Javascript Files -->
  <!-- Tambahkan link ke CDN Tailwind CSS -->
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="<?= base_url('assets/library/sweetalert/sweetalert2.all.min.js') ?>"></script>
  <script src="<?= base_url('assets/dashboard/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/library/chartjs/chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/javascript/function_all.js') ?>"></script>
  <script src="<?= base_url('assets/library/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('assets/library/select2/js/select2.min.js') ?>"></script>

  <style>
     ::-webkit-scrollbar {
    width: 10px;
    background-color:#F3F4F6;
  }
  
  ::-webkit-scrollbar-thumb {
    background-color: grey;
  }
  
  ::-webkit-scrollbar-track {
    background-color: transparent;
  }
  .scrollbar {
    scrollbar-color: transparent transparent; /* Warna thumb dan track scrollbar */
    scrollbar-width: thin; /* Lebar scrollbar */
  }

  .course-card{
    background-color: #F3F4F6;
  }
  .course-image {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .custom-card {
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s;
    position: relative;
  }
  .custom-card:hover {
    transform: scale(1.02);
  }

  .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      opacity: 0;
      transition: opacity 0.2s;
  }

  .custom-card:hover .overlay {
    opacity: 1;
  }

  .overlay-content {
      color: #fff;
      text-align: center;
  }
  .my-popup-size {
  width: 400px;
  height: 150px;
  font-size: 10px;
  }
  @media print {
        .hidden-print {
            display: none !important;
        }
    }
  </style>
</head>
 
<?php 
  if (isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
      
  } else {
        $_SESSION['logged_in'] = false;
  }
?>
