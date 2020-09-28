<div class="col-sm-12 clear-fix">
  <div class="card" style="background-image: url(<?= base_url('assets/_jadwal/bg2.jpg') ?>);
      background-position: top right;
      background-attachment: fixed;
      background-size: cover;">
    <div class="card-header bg-dark" style="opacity: 0.9">
      <h3 class="card-title"><?php if(!empty($card_header)){echo $card_header;} ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body bg-dark" style="opacity: 0.9">
      <div class="table-responsive">

        <table class="table table-bordered table-dark table-striped" id="tabel-jadwal" style="border-color: #000000">
          <thead>
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
                    $jadwal_tunggal = $this->_jadwalModel->get_jadwal_mahasiswa_tabel(
                        $value_jam['jam_mulai1'], 
                        $value_jam['jam_selesai1'], 
                        $value_hari['hari'], 
                        $kelas, 
                        $jurusan
                    );
                  ?>
                  
                  <?php if ( $jadwal_tunggal ): ?>
                    <td class="data_jadwal <?php 
                        if( $jadwal_tunggal[0]['jenis']=='tetap' ){
                            echo 'tetap';
                        }
                        else{
                            echo 'tambahan';
                        }
                        if( $jadwal_tunggal[0]['aktif'] ){
                          echo ' myGlower';
                        }
                        if( !empty($jadwal_tunggal[0]['tabrakan']) ){
                          echo ' tabrakan';
                        }
                      ?>" id="td-<?php echo $jadwal_tunggal[0]['id'] ?>" onclick="show_modal(<?php echo $jadwal_tunggal[0]['id'] ?>)"  data-toggle="modal" data-target="#exampleModalLong" style="background-color: <?php if(!empty($jadwal_tunggal[0]['warna_dosen'])){echo $jadwal_tunggal[0]['warna_dosen'];} ?>">
                      <span class="inisial font-weight-bold"><?php 
                          foreach ($jadwal_tunggal as $key => $value) {
                            echo $value['inisial'] . '<br>';
                          }
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

        <div class="col-sm-6 col-md-3 text-center">
          <p class="tetap1">Jadwal Tetap</p>
          <p class="tambahan1">Jadwal Tambahan</p>
          <p class="tabrakan">Tabrakan</p>
        </div>


      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
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
          <div class="modal-body">
            <div id="modal_content"></div>
            <button type="button" class="btn btn-sm btn-secondary float-right" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>