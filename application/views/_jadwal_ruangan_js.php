<script type="text/javascript">
  var index_hari_saat_ini = '<?php echo $index_hari_saat_ini ?>';
  var ruangan_saat_ini = '<?php echo $ruangan_saat_ini ?>';
  function load_data() {
    $.get("<?= base_url() ?>jadwal/get_jadwal_ruangan/"+index_hari_saat_ini+"/"+ruangan_saat_ini, function(data) {
      $("#tabel-jadwal").html(data);
      $(".loader").hide();
    });
  }
  function show_modal(id) {
    let detail_jadwal = $('#tr-'+id+' #detail_jadwal').html();
    console.log(detail_jadwal);
    $("#modal_content").html(detail_jadwal);
  }

  // refresh data
  setInterval(function() {
    if ( navigator.onLine ) {
      load_data();
    }
    
  }, 30000);

  // deteksi offline
  setInterval(function() {
    if ( navigator.onLine == false ) {
      offline_notification();
    }
    
  }, 1000);

  load_data();
</script>