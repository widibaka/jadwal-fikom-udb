<div class="col-sm-12 clear-fix">
  <div class="card" >
    <div class="card-header bg-dark">
      <h3 class="card-title"><?php if(!empty($card_header)){echo $card_header;} ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body bg-dark">
      <div>

        <table class="table table-striped table-dark" id="tabel-jadwal">
          <div class="text-center">
            <img class="loader rounded-circle" src="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/ajax-loader.gif?1">
          </div>
        </table>
        <div class="text-muted">
          <small>Makul akan menyala 15 menit sebelum memasuki jam kuliah</small>
        </div>


      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

