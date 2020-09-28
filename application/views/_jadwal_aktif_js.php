<script type="text/javascript">
  function load_data() {
    $.get("<?= base_url() ?>jadwal/get_jadwal_aktif/", function(data) {
      $("#tabel-jadwal").html(data);
      $(".loader").hide();
    });
  }
  function show_modal(id) {
    let detail_jadwal = $('#tr-'+id+' #detail_jadwal').html();
    console.log(detail_jadwal);
    $("#modal_content").html(detail_jadwal);
  }

  function offline_notification() {
    var isi = '<tr class="bg-abu-abu text-center"><td colspan="4">Kamu lagi offline!<br>...</td></tr>'
    $('#myTB').html(isi);
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