
    <div class="col-sm-12 text-white">
      <div class="card" style="overflow: hidden; background-image: url(<?= base_url('assets/_jadwal/bg.jpg') ?>);
          background-position: center;
          background-attachment: fixed;
          background-size: cover;">
        <div class="card-header bg-dark" style="opacity: 0.9">
          <h3 class="card-title">02</h3>
        </div>
        <div class="card-body bg-dark" style="opacity: 0.9">
          <div class="my-3 p-3 bg-dark rounded box-shadow">


            <div class="table-responsive">
              <table class="table table-bordered" id="tabel-jadwal">
                <div class="text-center loader">
                  <img src="<?= base_url('assets/_jadwal') ?>/Offcanvas_files/ajax-loader.gif">
                </div>
              </table>


              <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                  </tbody>
                </table>



              <div class="text-muted">
                <small>Makul akan menyala 15 menit sebelum memasuki jam kuliah</small>
              </div>
            </div>
            



          </div>
        </div>
      </div>
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
            <table class="table table-bordered">
              <tr>
                <th>Hari </th>
                <td id="mo_hari"></td>
              </tr>
              <tr>
                <th>Jam </th>
                <td id="mo_jam"></td>
              </tr>
              <tr>
                <th>Mata kuliah </th>
                <td id="mo_mata_kuliah"></td>
              </tr>
              <tr>
                <th>SKS </th>
                <td id="mo_sks"></td>
              </tr>
              <tr>
                <th>Sifat </th>
                <td id="mo_sifat"></td>
              </tr>
              <tr>
                <th>Dosen </th>
                <td id="mo_dosen"></td>
              </tr>
              <tr>
                <th>Ruang </th>
                <td id="mo_ruang"></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    
  