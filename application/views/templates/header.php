<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jadwal Fikom UDB - <?= $title ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/_jadwal/') ?>logo.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
  <meta name="description" content="Jadwal yang enggak bikin mata pedih">
  <meta name="keywords" content="Jadwal, duta bangsa, universitas, fakultas komputer">
  <meta name="author" content="Widi Baka">
  <meta name="robots" content="index, follow" />
  <meta name="language" content="id" />
  <meta name="geo.country" content="id" />
  <meta http-equiv="content-language" content="In-Id" />
  <meta name="geo.placename" content="Indonesia" />

  <meta property="og:type" content="software" />
  <meta property="og:image" content="<?= base_url("<?= base_url('assets/_jadwal/') ?>logo.png") ?>" />
  <meta property="og:title" content="Jadwal Fikom UDB" />
  <meta property="og:description" content="Jadwal yang enggak bikin mata pedih">
  <meta property="og:url" content="<?= base_url() ?>" />
  <meta property="og:site_name" content="Koreksoft" />


  <!-- Menu Keren -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/_jadwal/menu-keren-style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style type="text/css">
    @-webkit-keyframes glow {
        to {
        border-left: 5px solid #456dff;
        background-color: #474040;
        }
    }

    .data_jadwal:hover{
      background-color: #666;
    }
    .tetap1{
      background-color: #1b4e81;
      color: #fff;
    }
    .tetap{
      background-color: #1b4e81;
      color: #fff;
    }
    .tetap:hover{
      background-color: #666;
    }
    .tambahan1{
      background-color: #46811b;
      color: #fff;
    }
    .tambahan{
      background-color: #46811b;
      color: #fff;
    }
    .tetap:hover{
      background-color: #666;
    }
    .tabrakan{
      background-color: #fc0324;
      color: #fff;
    }

    .menyala {
        z-index: -1;
        -webkit-animation: glow 500ms infinite alternate;  
         -webkit-transition: border 1.0s linear, box-shadow 1.0s linear;
           -moz-transition: border 1.0s linear, box-shadow 1.0s linear;
                transition: border 1.0s linear, box-shadow 1.0s linear;
    }

    .border-kiri {
        border-left: 5px solid #ff7083;
    }
    .bg-z2 {
        background-color: #ff7083;
    }
    .bg-abu-abu{
        color: #919191;
    }
    .bg-cerah{

        color: #fff;
    }
    .loader{
        padding-top: 2px;
        padding-bottom: 5px;
    }

  </style>

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed sidebar-closed sidebar-collapse" style="background-color: #282c31">
<!-- Site wrapper -->
<div class="wrapper">

