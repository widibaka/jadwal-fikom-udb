
   
  <div class="col-sm-12 clear-fix">
    <div class="card" >
      <div class="card-header bg-dark">
        <h3 class="card-title"><?php echo $card_header ?></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body bg-dark">
        <div class="form-group">
          <p>Inputkan sebuah link gambar misalnya <br>
            <ol>
              <li><span class="text-warning"><?= base_url('assets/_jadwal/yae-sakura.jpg') ?></span></li>
              <li><span class="text-warning">https://i.pinimg.com/originals/d1/34/49/d13449fb76b34cb71584f5bfb7c6dee9.gif</span></li>
              <li><span class="text-warning"><?= base_url('assets/_jadwal/bronya.jpg') ?></span></li>
              <li><span class="text-warning"><?= base_url('assets/_jadwal/miku_glasses.jpg') ?></span></li>
              <li><span class="text-warning"><?= base_url('assets/_jadwal/miku.jpg') ?></span></li>
            </ol>
          <p>Background ini akan diterapkan secara lokal di perangkat Anda, dan tidak akan muncul di perangkat pengguna lain.</p>
          <p class="peringatan alert-danger" style="display: none;">Background mungkin akan lama muncul tergantung pada besar image yang digunakan.</p>
          <textarea class="form-control" rows="4" id="bg_url"></textarea>
          <div class="btn-group col-sm-12 mt-3">
            <button class="btn btn-primary" id="terapkan">Terapkan</button>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  