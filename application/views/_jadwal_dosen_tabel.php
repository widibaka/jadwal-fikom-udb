<!DOCTYPE html>
<!-- saved from url=(0053) -->
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('assets/_jadwal/Offcanvas_files/'.$icon) ?>">

    <title><?php echo $title ?></title>

    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/offcanvas.css" rel="stylesheet">

    <style type="text/css">
      .data_jadwal:hover{
        background-color: #666;
      }
      .tetap1{
        background-color: #ffff4d;
      }
      .tetap{
        background-color: #ffff4d;
      }
      .tetap:hover{
        background-color: #666;
      }
      .tambahan1{
        background-color: #b0f542;
      }
      .tambahan{
        background-color: #b0f542;
      }
      .tetap:hover{
        background-color: #666;
      }
      .tabrakan{
        background-color: #fc0324;
        color: #03fcf0;
      }
      #myTB td{
        min-width: 150px;
      }

      @-webkit-keyframes glow {
          to {
          background-color: #ffdbe0;
          border-left: 5px solid #456dff;
          border-right: 2px solid #32a840;
          }
      }

      .myGlower {
          z-index: -1;
          -webkit-animation: glow 500ms infinite alternate;  
           -webkit-transition: border 1.0s linear, box-shadow 1.0s linear;
             -moz-transition: border 1.0s linear, box-shadow 1.0s linear;
                  transition: border 1.0s linear, box-shadow 1.0s linear;
      }
    </style>

  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="<?= base_url('jadwal') ?>"><?php echo $title ?></a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('jadwal/') ?>">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('jadwal/dosen_index/')  ?>">Pilih Dosen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('jadwal/dosen/') . $enc_dosen ?>">Jadwal Hari Ini</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('jadwal/dosen/') . $enc_dosen . '/semua' ?>">Jadwal Sepekan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('jadwal/jadwal_tabel_dosen/') . $enc_dosen ?>">Jadwal Tabel <span class="badge badge-danger">New</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="my-3 p-3 bg-white rounded box-shadow table-responsive">



        <table class="table table-bordered text-dark table-striped" id="tabel-jadwal" style="border-color: #000000">
          

          <thead class="table-dark">
            <tr>
              <th scope="col">Jam</th>
              <?php foreach ($hari as $key => $value): ?>
                <th scope="col"><?php echo $value['hari'] ?></th>
              <?php endforeach ?>
            </tr>
          </thead>
          <tbody id="myTB">

            <?php foreach ($jam as $key => $value_jam): ?>
              <tr>
                <td><?php echo substr( $value_jam['jam_mulai1'], 0, -3 ) ?> - <?php echo substr( $value_jam['jam_selesai1'], 0, -3 ) ?></td>
                
                <?php foreach ($hari as $key => $value_hari): 
                  // di sini inti dari loopingnya!
                  ?>
                  <?php 
                    $jadwal_tunggal = $this->_jadwalModel->get_jadwal_dosen_tabel(
                        $value_jam['jam_mulai1'], 
                        $value_jam['jam_selesai1'], 
                        $value_hari['hari'], 
                        $nama_dosen
                    );
                  ?>
                  
                  <?php if ( $jadwal_tunggal ): ?>
                    <td class="data_jadwal <?php 
                        if( $jadwal_tunggal['jenis']=='tetap' )
                          {
                            echo 'tetap';
                          }
                        else
                          {
                            echo 'tambahan';
                          }
                        if( $jadwal_tunggal['aktif'] )
                        {
                          echo ' myGlower';
                        }
                        if( !empty($jadwal_tunggal['tabrakan']) )
                        {
                          echo ' tabrakan';
                        }
                      ?>" id="td-<?php echo $jadwal_tunggal['id'] ?>" onclick="show_modal(<?php echo $jadwal_tunggal['id'] ?>)"  data-toggle="modal" data-target="#exampleModalLong">
                      <span class="inisial font-weight-bold"><?php echo $jadwal_tunggal['inisial'] ?></span>
                      <span class="hari d-none"><?php echo $value_hari['hari'] ?></span>
                      <span class="jam d-none"><?php echo $jadwal_tunggal['jam_mulai'] ?> - <?php echo $jadwal_tunggal['jam_selesai'] ?></span>
                      <span class="mata_kuliah d-none"><?php echo $jadwal_tunggal['mata_kuliah'] ?></span>
                      <span class="sifat d-none"><?php echo $jadwal_tunggal['sifat'] ?></span>
                      <span class="sks d-none"><?php echo $jadwal_tunggal['sks'] ?></span>
                      <span class="dosen d-none"><?php echo $jadwal_tunggal['dosen'] ?></span>
                      <span class="ruang d-none"><a title="Buka jadwal ruang <?php echo $jadwal_tunggal['ruang'] ?> hari <?php echo $jadwal_tunggal['hari'] ?>" href="<?php echo base_url() . 'jadwal/ruangan/'.$jadwal_tunggal['index_hari'].'/' . base64_encode(str_replace('/', 'garis_miring', $jadwal_tunggal['ruang'])) ?>"><?php echo $jadwal_tunggal['ruang'] ?></a></span>
                      <span class="kelas d-none"><a title="Buka jadwal kelas <?php echo strtoupper($jadwal_tunggal['jurusan']) . ' ' . $jadwal_tunggal['kelas'] ?>" href="<?php echo base_url('jadwal/kelas/') . $jadwal_tunggal['jurusan'] . "/" . $jadwal_tunggal['kelas'] ?>"><?php echo strtoupper($jadwal_tunggal['jurusan']) . ' ' . $jadwal_tunggal['kelas'] ?></a></span>
                      <span class="jenis d-none"><?php echo $jadwal_tunggal['jenis'] ?></span>



                    </td>
                  <?php else: ?>
                    <td class="data_jadwal" id="td-111<?php echo $value_hari['index_hari'] . $value_jam['id'] ?>" <?php 
                      if ( !empty( $this->session->userdata('admin') ) ) {
                        echo 'onclick="add_jadwal(111' . $value_hari['index_hari'] . $value_jam['id'] . ')"  data-toggle="modal" data-target="#exampleModalLong"';
                      }
                    ?>>
                      <span class="hari d-none"><?php echo $value_hari['hari'] ?></span>
                      <span class="jam d-none"><?php echo $value_jam['jam'] ?></span>
                      
                    </td>
                  <?php endif ?>

                <?php endforeach ?>
                
              </tr>
            <?php endforeach ?>
            
          </tbody>


        </table>

        <div class="col-sm-6 col-md-3 text-center">
          <p class="tetap1">Jadwal Tetap</p>
          <p class="tambahan1">Jadwal Tambahan</p>
          <p class="tabrakan">Tabrakan</p>
        </div>

      </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Detail </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered view">
              <tr>
                <th>Hari </th>
                <td id="mo_hari"></td>
              </tr>
              <tr>
                <th>Jam </th>
                <td id="mo_jam"></td>
              </tr>
              <tr>
                <th>Mata kuliah </th>
                <td id="mo_mata_kuliah"></td>
              </tr>
              <tr>
                <th>Sifat </th>
                <td id="mo_sifat"></td>
              </tr>
              <tr>
                <th>SKS </th>
                <td id="mo_sks"></td>
              </tr>
              <tr>
                <th>Dosen </th>
                <td id="mo_dosen"></td>
              </tr>
              <tr>
                <th>Kelas </th>
                <td id="mo_kelas"></td>
              </tr>
              <tr>
                <th>Ruang </th>
                <td id="mo_ruang"></td>
              </tr>
              <tr>
                <th>Jenis </th>
                <td id="mo_jenis"></td>
              </tr>
            </table>
            <form action="" method="post">
              <table class="table table-bordered edit" style="display: none;">
                <tr class="d-none">
                  <td><input type="text" name="jadwal_id" id="jadwal_id"></td>
                </tr>
                <tr class="d-none">
                  <td><input type="text" name="hari" id="edit_hari"></td>
                </tr>
                <tr class="d-none">
                  <td><input type="text" name="jam" id="edit_jam"></td>
                </tr>
                <tr>
                  <th>Mata Kuliah</th>
                  <td>
                    <select class="form-control" name="matakul_id">
                      <?php foreach ($matakul as $key => $value): ?>
                        <option value="<?php echo $value['id'] ?>"  inisial="<?php echo $value['inisial'] ?>"><?php echo $value['inisial'] ?></option>
                      <?php endforeach ?>
                        <option value="hapus" style="color: red; font-weight: bold;">--- HAPUS JADWAL INI ---</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>Jenis Jadwal</th>
                  <td>
                    <select class="form-control" name="jenis">
                      <option value="tetap">tetap</option>
                      <option value="tambahan">tambahan</option>
                    </select>
                  </td>                
                </tr>
                <tr>
                  <th>Password</th>
                  <td>
                    <input class="form-control" type="text" name="password">
                  </td>                
                </tr>
              </table>
                <?php if ( !empty($this->session->userdata('admin')) ): ?>
                  <a class="btn btn-primary btn_edit text-white">Edit</a>
                <?php endif ?>
                <button class="btn btn-primary btn_simpan" style="display: none;" type="submit">Simpan/Submit</button>
                <a class="btn btn-secondary btn_batal text-white" style="display: none;" data-dismiss="modal" aria-label="Close">Batal</a>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets/') ?>_jadwal/Offcanvas_files/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/popper.min.js"></script>
    <script src="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/holder.min.js"></script>
    <script src="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/offcanvas.js"></script>
    <?php 
      if ( $this->session->flashdata("message") ) {
        echo $this->session->flashdata("message");
      }
    ?>
    <script type="text/javascript">
      // var index_hari_saat_ini = '<?php //echo $index_hari_saat_ini ?>';
      // var ruangan_saat_ini = '<?php //echo $ruangan_saat_ini ?>';
      // function load_data() {
      //   $.get("<?php //echo base_url() ?>jadwal/get_jadwal_ruangan/"+index_hari_saat_ini+"/"+ruangan_saat_ini, function(data) {
      //     $("#tabel-jadwal").html(data);
      //     $(".loader").hide();
      //   });
      // }
      function show_modal(id) {
        // batal_edit();
        $("option").removeAttr("selected"); // hapus dulu selected semuanya
        let hari = $('#td-'+id+' .hari').html();
        let jam = $('#td-'+id+' .jam').html();
        let mata_kuliah = $('#td-'+id+' .mata_kuliah').html();
        let sifat = $('#td-'+id+' .sifat').html();
        let sks = $('#td-'+id+' .sks').html();
        let dosen = $('#td-'+id+' .dosen').html();
        let kelas = $('#td-'+id+' .kelas').html();
        let ruang = $('#td-'+id+' .ruang').html();
        let jenis = $('#td-'+id+' .jenis').html();
        let inisial = $('#td-'+id+' .inisial').html();
        let jadwal_id = id;

        $("#mo_hari").html(hari);
        $("#mo_jam").html(jam);
        $("#mo_mata_kuliah").html(mata_kuliah);
        $("#mo_sks").html(sks);
        $("#mo_dosen").html(dosen);
        $("#mo_sifat").html(sifat);
        $("#mo_kelas").html(kelas);
        $("#mo_ruang").html(ruang);
        $("#mo_jenis").html(jenis);
        
        $("#jadwal_id").val(jadwal_id);
        $("#edit_hari").val(hari);
        $("#edit_jam").val(jam);
        $("option[inisial='"+inisial+"']").attr("selected", "selected");
        $("option[value='"+jenis+"']").attr("selected", "selected");
      }
    </script>
  

<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="2" style="font-weight:bold;font-size:2pt;font-family:Arial, Helvetica, Open Sans, sans-serif">32x32</text></svg></body></html>