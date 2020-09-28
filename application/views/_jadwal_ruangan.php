
<div class="col-sm-12 text-white">
  <div class="card" style=" background-image: url(<?= base_url('assets/_jadwal/bg.jpg') ?>);
      background-position: center;
      background-attachment: fixed;
      background-size: cover;">
    <div class="card-header bg-dark" style="opacity: 0.9">
      <h3 class="card-title"><?php if(!empty($card_header)){echo $card_header;} ?></h3>
    </div>
    <div class="card-body bg-dark" style="opacity: 0.9">


      <div class="btn-group mb-4 col-sm-12 col-md-3">
        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false"><?php echo $hari_saat_ini ?>
        </button>
          <div class="dropdown-menu">
            <?php foreach ($hari[0] as $key => $value): ?>
              <?php if ( $hari_saat_ini == $value ): ?>
                <a class="dropdown-item active" href="<?php echo base_url('jadwal/ruangan/') . $hari[1][$key] . '/' . $ruangan_saat_ini ?>"><?php echo $value ?></a>
              <?php else: ?>
                <a class="dropdown-item" href="<?php echo base_url('jadwal/ruangan/') . $hari[1][$key] . '/' . $ruangan_saat_ini ?>"><?php echo $value ?></a>
              <?php endif ?>
              
            <?php endforeach ?>
          </div>
      </div>


      <div class="btn-group mb-4 col-sm-12 col-md-3">
        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false"><?php echo base64_decode(str_replace('garis_miring', '/', $ruangan_saat_ini)) ?>
        </button>
          <div class="dropdown-menu">
            <?php foreach ($ruangan as $key => $value): ?>
              
              <?php if ( base64_decode(str_replace('garis_miring', '/', $ruangan_saat_ini)) == $value ): ?>
                <a class="dropdown-item active" href="<?php echo base_url('jadwal/ruangan/') . $index_hari_saat_ini . '/' . str_replace('/', 'garis_miring', base64_encode($value)) ?>"><?php echo $value ?></a>
              <?php else: ?>
                <a class="dropdown-item" href="<?php echo base_url('jadwal/ruangan/') . $index_hari_saat_ini . '/' . str_replace('/', 'garis_miring', base64_encode($value)) ?>"><?php echo $value ?></a>
              <?php endif ?>
            <?php endforeach ?>
          </div>
      </div>

      <div class="btn-group mb-4 col-sm-12 col-md-3">
        <a class="btn btn-default" href="<?php echo base_url() . 'jadwal/jadwal_tabel_ruangan/Senin/' ?>">Tampilan Tabel Jadwal Ruangan</a>
      </div>



      <div class="my-3 p-3 bg-dark rounded box-shadow">


        <div class="table-responsive">
          <table class="table table-striped table-dark" id="tabel-jadwal">
            <div class="text-center loader">
              <img src="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/ajax-loader.gif">
            </div>
          </table>





          <div class="text-muted">
            <small>Makul akan menyala 15 menit sebelum memasuki jam kuliah</small>
          </div>
        </div>
        



      </div>
    </div>
  </div>
</div>
  

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
      <div class="modal-body" id="modal_content">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

