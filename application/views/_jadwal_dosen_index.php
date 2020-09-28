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
      <div>

        <div class="mb-2">
          <form class="col-sm-12">
            <input class="form-control mr-sm-2" type="text" placeholder="Search dosen" aria-label="Search" id="myInput" onkeyup="myFunction()">
          </form>
        </div>
        <p>Jumlah: <?php echo count($dosen) ?></p>
        <ul class="list-group" id="daftar_kelas">
          <?php foreach ($dosen as $key => $value): ?>
            
            <a class="mb-2" href="<?php echo base_url('jadwal/dosen/') . str_replace('/', 'garis_miring', base64_encode($value)) ?>"><li class="font-weight-bold text-center btn btn-primary" style="width: 100%"><?php echo $value ?></li></a>

          <?php endforeach ?>
        </ul>



      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>


    <script type="text/javascript">
      function myFunction() {
          var input, filter, ul, a, li, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          ul = document.getElementById("daftar_kelas");
          a = ul.getElementsByTagName("a");
          for (i = 0; i < a.length; i++) {
              li = a[i].getElementsByTagName("li")[0];
              txtValue = li.textContent || li.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  a[i].style.display = "";
              } else {
                  a[i].style.display = "none";
              }
          }
      }
    </script>