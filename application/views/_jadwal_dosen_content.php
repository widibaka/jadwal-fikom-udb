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
  <?php if ( count($jadwal) == 0 ): ?>
    <tr>
      <td class="hari"><i>Tidak ada kelas error ...</i></td>
    </tr>
  <?php else: ?>
      <?php foreach ($jadwal as $key => $value): ?>
        
        <tr class="<?php echo $value['nyala'] ?>" id="tr-<?php echo $value['id'] ?>" onclick="show_modal(<?php echo $value['id'] ?>)"  data-toggle="modal" data-target="#exampleModalLong">

          <td class="hari"><?php echo $value['hari'] ?></td>
          <td class="jam"><?php echo substr($value['jam_mulai'], 0, -3) . ' - ' . substr($value['jam_selesai'], 0, -3) ?></td>
          <td class="mata_kuliah"><?php echo $value['mata_kuliah'] ?> <?php 
          
          // ketika kkurang 15 menit sblm mulai
          if ( -60*15 < $value['selisih_dg_waktu_mulai'] && $value['selisih_dg_waktu_mulai'] < 0 ) {
            $selisih_dg_waktu_mulai = str_replace('-', '', $value['selisih_dg_waktu_mulai']);
            $jam = sprintf('%02d',  floor($selisih_dg_waktu_mulai / (60*60) )   );
            $sisa_setelah_jam = $selisih_dg_waktu_mulai % (60*60);
            $menit = sprintf('%02d',  floor($sisa_setelah_jam / 60)   );
            $sisa_setelah_menit = $selisih_dg_waktu_mulai % 60;
            $detik = sprintf('%02d',  $selisih_dg_waktu_mulai % 60   );

            echo '<span class="badge badge-success '.$value['timer'].'">Mulai dalam ';
            echo $jam . ":" . $menit . ":" . $detik;
            echo '</span>';

          }
          // ketika masuk jam kuliah
          elseif ( $value['selisih_dg_waktu_selesai'] > 0 && 0 < $value['selisih_dg_waktu_mulai'] ) {
            $selisih_dg_waktu_selesai = str_replace('-', '', $value['selisih_dg_waktu_selesai']);
            $jam = sprintf('%02d',  floor($selisih_dg_waktu_selesai / (60*60) )   );
            $sisa_setelah_jam = $selisih_dg_waktu_selesai % (60*60);
            $menit = sprintf('%02d',  floor($sisa_setelah_jam / 60)   );
            $sisa_setelah_menit = $selisih_dg_waktu_selesai % 60;
            $detik = sprintf('%02d',  $selisih_dg_waktu_selesai % 60   );

            echo '<span class="badge badge-primary '.$value['timer'].'">';
            echo $jam . ":" . $menit . ":" . $detik;
            echo '</span>';
          }

          ?></td>

          <td class="sks d-none"><?php echo $value['sks'] ?></td>
          <td class="sifat d-none"><?php echo $value['sifat'] ?></td>
          <td class="kelas"><?php echo strtoupper($value['jurusan']) . ' ' . $value['kelas'] ?></td>
          <td class="ruang"><?php echo $value['ruang'] ?></td>

        </tr>

      <?php endforeach ?>

  <?php endif ?>
  
</tbody>