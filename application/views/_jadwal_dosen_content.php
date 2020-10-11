<thead>
  <tr>
    <th scope="col">Hari</th>
    <th scope="col">Jam</th>
    <th scope="col">Mata Kuliah</th>
    <th scope="col">Kelas</th>
    <th scope="col">Ruang</th>
  </tr>
</thead>
<tbody id="myTB">
  <?php 
    $jum_mata_kuliah = count($jadwal);
    $jum_bukan_hari_ini = 0; // inisialisasi, nanti ditambah2 pas looping
  ?>
  <?php if ( !empty( $jadwal ) ): ?>

    <?php 
    // warna hari
    $warna_hari = ['primary', 'danger', 'info', 'primary', 'warning', 'success', 'primary', 'danger' ];
    ?>

    <?php foreach ($jadwal as $key => $value): ?>

      <?php 
        if ( $value['nyala'] == 'bg-abu-abu d-none' ) // kalau isinya diprint tapi gak ditampilkan, berarti ini jadwal yang bukan hari ini
        {
          $jum_bukan_hari_ini++;
        }

        // kalau jadwal udah terlampaui, maka kasih abu=abu aja
        $value['jadwal_udah_lewat'] = ''; // inisialisasi
        if ( $value['selisih_dg_waktu_selesai'] < 0 ) {
          $value['jadwal_udah_lewat'] = 'bg-abu-abu';
        }

      ?>
      
      <tr class="<?php echo $value['nyala'] ?> <?php echo $value['jadwal_udah_lewat'] ?>" id="tr-<?php echo $value['id'] ?>" onclick="show_modal(<?php echo $value['id'] ?>)"  data-toggle="modal" data-target="#exampleModalLong">

        <td class=" font-weight-bold text-<?php echo $warna_hari[ $value['index_hari'] ] ?>"><?php echo $value['hari'] ?></td>
        <td ><?php echo substr($value['jam_mulai'], 0, -3) . ' - ' . substr($value['jam_selesai'], 0, -3) ?></td>
        <td><?php echo $value['mata_kuliah'] ?> <?php 
        
        // ketika kkurang 15 menit (gak jadi, ganti 12 jam aja) sblm mulai
        if ( -60*60*12 < $value['selisih_dg_waktu_mulai'] && $value['selisih_dg_waktu_mulai'] < 0 ) {
          $timer = $this->_jadwalModel->hitung_time_left( $value['selisih_dg_waktu_mulai'] );

          echo '<br><span class="badge badge-success timer '.$value['timer'].'">';
          echo "Mulai dalam " . $timer['jam'] . ":" . $timer['menit'];
          echo '</span>';

        }
        // ketika masuk jam kuliah
        elseif ( $value['selisih_dg_waktu_selesai'] > 0 && 0 < $value['selisih_dg_waktu_mulai'] ) {
          $timer = $this->_jadwalModel->hitung_time_left( $value['selisih_dg_waktu_selesai'] );

          echo '<br><span class="badge badge-primary timer '.$value['timer'].'">';
          echo "Berlangsung " . $timer['jam'] . ":" . $timer['menit'];
          echo '</span>';
        }

        ?></td>

        <td class="mata_kuliah d-none"><?php echo $value['mata_kuliah'] ?></td>
        <td class="sks d-none"><?php echo $value['sks'] ?></td>
        <td class="sifat d-none"><?php echo $value['sifat'] ?></td>
        <td class="kelas"><?php echo strtoupper($value['jurusan']) . ' ' . $value['kelas'] ?></td>
        <td class="ruang"><?php echo $value['ruang'] ?></td>

        <!-- Detail jadwal -->
        <td class="d-none" id="detail_jadwal">
          <ul class="list-group" style="list-style-type: none;" style="border: none;">
              
            <li class="mb-2">Hari: <strong><?php echo $value['hari'] ?></strong></li>
            <li class="mb-2">Jam: <strong><?php echo substr($value['jam_mulai'], 0, -3) . ' - ' . substr($value['jam_selesai'], 0, -3) ?></strong></li>
            <li class="mb-2">Mata kuliah: <strong><?php echo $value['mata_kuliah'] ?></strong></li>
            <li class="mb-2">SKS: <strong><?php echo $value['sks'] ?></strong></li>
            <li class="mb-2">Dosen: <strong><a title="Buka jadwal milik <?php echo $value['dosen'] ?>" href="<?php echo base_url('jadwal/dosen/') . str_replace('/', 'garis_miring', base64_encode($value['dosen'])) ?>"><?php echo $value['dosen'] ?></a></strong></li>
            <li class="mb-2">Sifat: <strong><?php echo $value['sifat'] ?></strong></li>
            <li class="mb-2">Kelas: <strong><a title="Buka jadwal kelas <?php echo strtoupper($value['jurusan']) . ' ' . $value['kelas'] ?>" href="<?php echo base_url('jadwal/kelas/') . $value['jurusan'] . "/" . $value['kelas'] ?>"><?php echo strtoupper($value['jurusan']) . ' ' . $value['kelas'] ?></a></strong></li>
            <li class="mb-2">Ruang: <strong><a title="Buka jadwal ruang <?php echo $value['ruang'] ?> hari <?php echo $value['hari'] ?>" href="<?php echo base_url() . 'jadwal/ruangan/'.$value['index_hari'].'/' . base64_encode(str_replace('/', 'garis_miring', $value['ruang'])) ?>"><?php echo $value['ruang'] ?></a></strong></li>

          </ul>
        </td>

      </tr>

    <?php endforeach ?>

    <?php if ( $jum_mata_kuliah == $jum_bukan_hari_ini ) : ?>

        <tr class="text-center bg-abu-abu">
          <td colspan="5">Tidak ada kuliah hari ini.  <br> Silakan buka "Jadwal Sepekan" di menu</td>
        </tr>
      
    <?php endif ?>





  <?php endif ?>
  
</tbody>