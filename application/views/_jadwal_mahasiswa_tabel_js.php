<?php 
  if ( $this->session->flashdata("message") ) {
    echo $this->session->flashdata("message");
  }
?>
<script type="text/javascript">
  // var index_hari_saat_ini = '<?php //echo $index_hari_saat_ini ?>';
  // var ruangan_saat_ini = '<?php //echo $ruangan_saat_ini ?>';
  // function load_data() {
  //   $.get("<?php //echo base_url() ?>jadwal/get_jadwal_ruangan/"+index_hari_saat_ini+"/"+ruangan_saat_ini, function(data) {
  //     $("#tabel-jadwal").html(data);
  //     $(".loader").hide();
  //   });
  // }
  function show_modal(id) {
    // batal_edit();
    // $("option").removeAttr("selected"); // hapus dulu selected semuanya
    let detail_jadwal = $('#td-'+id+' #detail_jadwal').html();
    console.log(detail_jadwal);
    $("#modal_content").html(detail_jadwal);
  }
  <?php if ( !empty( $this->session->userdata('admin') ) ): ?>
    function add_jadwal(id) {
      add_form();
      let hari = $('#td-'+id+' .hari').html();
      let jam = $('#td-'+id+' .jam').html();
      $("#edit_hari").val(hari);
      $("#edit_jam").val(jam);
    }

    function add_form() {
      $("#jadwal_id").val(''); // kosongkan
      $("option").removeAttr("selected"); // hapus dulu selected semuanya
      $('#exampleModalLongTitle').html('Tambah');
      $('.btn_edit').hide();
      $('.btn_simpan').show();
      $('.btn_batal').show();

      $('.view').hide();
      $('.edit').show();
    }

    function edit_form() {
      $('#exampleModalLongTitle').html('Edit');
      $('.btn_edit').hide();
      $('.btn_simpan').show();
      $('.btn_batal').show();

      $('.view').hide();
      $('.edit').show();
    }

    function batal_edit() {
      $("#jadwal_id").val(''); // kosongkan
      $('#exampleModalLongTitle').html('Detail');
      $('.btn_batal').hide();
      $('.btn_simpan').hide();
      $('.btn_edit').show();

      $('.view').show();
      $('.edit').hide();
    }
    // setInterval(function() {
    //   load_data();
    // }, 1000)

    $('.btn_edit').click(function() {
      edit_form();
    })

    $('.btn_batal').click(function() {
      batal_edit();
    })
  <?php endif ?>
</script>