
      </div><!-- /.container-fluid -->
    </section>




  </div>

    <!-- /.content -->
  <footer class="main-footer" style="border-top: none; background-color: #282c31;">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script>
// Check browser support
if ( localStorage.getItem("bg") == null || localStorage.getItem("bg") == 'url()' ) { // kalau bg -nya null ATAU string kosong
  $('html').css('background-image', "url('<?= base_url('assets/_jadwal/default.png') ?>')");
}
else{
  $('html').css('background-image', localStorage.getItem("bg"));
}
<?php 
// kalau ada parameter no_count maka lanjutin terus ke semua anchor
if ( !empty($_GET['no_count']) ): ?>
  
  $("a").each( function() {
    var href = $(this).attr('href');
    href = href + "?no_count=1";
    $(this).attr('href', href);
  } );
<?php endif ?>
</script>
</body>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_content">
        
      </div>
      <div>
        <button type="button" class="btn btn-sm btn-secondary float-right mb-3 mr-3" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</html>
