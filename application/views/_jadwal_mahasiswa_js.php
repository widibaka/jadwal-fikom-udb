<script type="text/javascript">
  var jurusan = '<?php echo $jurusan ?>';
  var jenis = '<?php echo $jenis ?>';
  var kelas = '<?php echo $kelas ?>';
  function load_data() {
    $.get("<?= base_url() ?>jadwal/get_jadwal/"+jurusan+"/"+kelas+"/"+jenis, function(data) {
      $("#tabel-jadwal").html(data);
      $(".loader").hide();
    });
  }
  function show_modal(id) {
    let hari = $('#tr-'+id+' .hari').html();
    let jam = $('#tr-'+id+' .jam').html();
    let mata_kuliah = $('#tr-'+id+' .mata_kuliah').html();
    let sks = $('#tr-'+id+' .sks').html();
    let sifat = $('#tr-'+id+' .sifat').html();
    let dosen = $('#tr-'+id+' .dosen').html();
    let ruang = $('#tr-'+id+' .ruang').html();
    $("#mo_hari").html(hari);
    $("#mo_jam").html(jam);
    $("#mo_mata_kuliah").html(mata_kuliah);
    $("#mo_sks").html(sks);
    $("#mo_sifat").html(sifat);
    $("#mo_dosen").html(dosen);
    $("#mo_ruang").html(ruang);
  }

  var i = 0;

  function count_down_timer() {
    var timeNow = $('.timer').html();
    i++;
    var newTime = new Date(timeNow.getTime() - i * 1000);
    $('.timer').html( newTime );
  }

  setInterval(function() {
    load_data();
  }, 2000);

  load_data();
</script>