
    <script type="text/javascript">
      function show_modal(id) {
        let detail_jadwal = $('#td-'+id+' #detail_jadwal').html();
        console.log(detail_jadwal);
        $("#modal_content").html(detail_jadwal);
      }
    </script>