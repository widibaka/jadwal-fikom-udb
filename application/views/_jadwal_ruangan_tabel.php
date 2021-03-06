<div class="col-sm-12 clear-fix">
  <div class="card" >
    <div class="card-header bg-dark">
      <h3 class="card-title"><?php if(!empty($card_header)){echo $card_header;} ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body bg-dark">

      
      <div class="btn-group mb-4 col-sm-12 col-md-3">
        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false"><?php echo $hari0 ?>
        </button>
          <div class="dropdown-menu">
            <?php foreach ($hari[0] as $key => $value): ?>
              <?php if ( $hari0 == $value ): ?>
                <a class="dropdown-item active" href="<?php echo base_url('jadwal/jadwal_tabel_ruangan/') . $value . '/' ?>"><?php echo $value ?></a>
              <?php else: ?>
                <a class="dropdown-item" href="<?php echo base_url('jadwal/jadwal_tabel_ruangan/') . $value . '/' ?>"><?php echo $value ?></a>
              <?php endif ?>
            <?php endforeach ?>
          </div>
      </div>


      <div class="btn-group mb-4 col-sm-12 col-md-3">
        <a class="btn btn-default" href="<?php echo base_url('jadwal/ruangan/') . '1/QXVsYSAx' ?>">Tampilan Jadwal Ruangan Lainnya
        </a>
      </div>

                        

      <div class="table-responsive">

        <table class="table table-sm table-bordered table-dark table-striped" id="tabel-jadwal">
          
          <thead class="table-dark">
            <tr>
              <th scope="col" style="padding: 0 40px 0 40px;">Jam</th>
              <?php foreach ($ruangan0['ruangan'] as $key => $value): ?>
                <th scope="col" style="padding: 0 40px 0 40px;"><?php echo $value ?></th>
              <?php endforeach ?>
            </tr>
          </thead>
          <tbody id="myTB">

            <?php foreach ($jam as $key => $value_jam): ?>
              <tr>
                <td><?php echo substr( $value_jam['jam_mulai1'], 0, -3 ) ?> - <?php echo substr( $value_jam['jam_selesai1'], 0, -3 ) ?></td>
                
                <?php foreach ($ruangan0['ruangan'] as $key => $value_ruangan): 
                  // di sini inti dari loopingnya!
                  ?>
                  <?php 
                    $jadwal_tunggal = $this->_jadwalModel->get_jadwal_ruangan_tabel(
                        $value_jam['jam_mulai1'], 
                        $value_jam['jam_selesai1'], 
                        $hari0, 
                        $value_ruangan
                    );
                  ?>

                  
                  <?php if ( $jadwal_tunggal ): ?>
                    <td class="data_jadwal <?php 
                        if( $jadwal_tunggal[0]['aktif'] ){
                          echo ' menyala_ruang_tabel';
                        }
                        if( !empty($jadwal_tunggal[0]['tabrakan']) ){
                          echo ' tabrakan';
                        }
                      ?>" id="td-<?php echo $jadwal_tunggal[0]['id'] ?>" onclick="show_modal(<?php echo $jadwal_tunggal[0]['id'] ?>)"  data-toggle="modal" data-target="#exampleModalLong" style="background-color: <?php if(!empty($jadwal_tunggal[0]['warna_dosen'])){echo $jadwal_tunggal[0]['warna_dosen'];} ?>">
                      <span class="inisial font-weight-bold"><?php 
                          echo $jadwal_tunggal[0]['inisial'];
                      ?></span>
                      
                      <!-- Detail jadwal -->
                      <span class="d-none" id="detail_jadwal">
                        <?php foreach ($jadwal_tunggal as $key => $value): ?>
                          <ul class="list-group" style="list-style-type: none;" style="border: none;">
                              
                            <li class="mb-2">Hari: <strong><?php echo $value['hari'] ?></strong></li>
                            <li class="mb-2">Jam: <strong><?php echo substr($value['jam_mulai'], 0, -3) . ' - ' . substr($value['jam_selesai'], 0, -3) ?></strong></li>
                            <li class="mb-2">Mata kuliah: <strong><?php echo $value['mata_kuliah'] ?></strong></li>
                            <li class="mb-2">SKS: <strong><?php echo $value['sks'] ?></strong></li>
                            <li class="mb-2">Dosen: <strong><a title="Buka jadwal milik <?php echo $value['dosen'] ?>" href="<?php echo base_url('jadwal/dosen/') . str_replace('/', 'garis_miring', base64_encode($value['dosen'])) ?>"><?php echo $value['dosen'] ?></a></strong></li>
                            <li class="mb-2">Sifat: <strong><?php echo $value['sifat'] ?></strong></li>
                            <li class="mb-2">Kelas: <strong><a title="Buka jadwal kelas <?php echo strtoupper($value['jurusan']) . ' ' . $value['kelas'] ?>" href="<?php echo base_url('jadwal/kelas/') . $value['jurusan'] . "/" . $value['kelas'] ?>"><?php echo strtoupper($value['jurusan']) . ' ' . $value['kelas'] ?></a></strong></li>
                            <li class="mb-2">Ruang: <strong><a title="Buka jadwal ruang <?php echo $value['ruang'] ?> hari <?php echo $value['hari'] ?>" href="<?php echo base_url() . 'jadwal/ruangan/'.$value['index_hari'].'/' . base64_encode(str_replace('/', 'garis_miring', $value['ruang'])) ?>"><?php echo $value['ruang'] ?></a></strong></li>
                            <li class="mb-2">Jenis: <strong><?php echo $value['jenis'] ?></strong></li>
                            <div class="mb-4" style="border-bottom: solid 1px #ddd;"></div>
                          </ul>
                        <?php endforeach ?>
                      </span>



                    </td>
                  <?php else: ?>
                    <td>
                      
                    </td>
                  <?php endif ?>

                <?php endforeach ?>
                
              </tr>
            <?php endforeach ?>
            
          </tbody>

        </table>

        <div class="col-sm-6 col-md-3 mb-4 text-center">
          <p class="tabrakan">Tabrakan</p>
        </div>


      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

