
   
  <div class="col-sm-12 clear-fix">
    <div class="card" >
      <div class="card-header bg-dark">
        <h3 class="card-title">02</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body bg-dark">

        <div class="col-sm-12 btn-group mb-4">
            <button class="btn btn-danger btn-lg p-2" data-toggle="modal" data-target="#modal_download">
              <i class="fa fa-desktop mr-2"></i>
               DOWNLOAD VERSI PC
            </button>
        </div>
        <div class="bg-dark pt-tablecell page-home relative">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title home text-center">
                          <span class="heading-page">Jadwal Fikom UDB ver.2
                          </span>
                            <!-- <p class="mt20">Pilih divisi kamu untuk melihat jadwal misi.</p> -->
                        </div>

                        <div class="hexagon-menu clear">
                            
                            <?php foreach ($jurusan as $key => $value): ?>
                              
                              <div class="hexagon-item">
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <a href="<?php echo base_url('jadwal/jurusan/') . $value ?>" class="hex-content">
                                      <span class="hex-content-inner">
                                          <span class="icon">
                                              <i class="fa fa-users"></i>
                                          </span>
                                          <span class="title"><?php echo $value ?></span>
                                      </span>
                                      <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                  </a>
                              </div>

                            <?php endforeach ?>

                              <div class="hexagon-item">
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <a href="<?php echo base_url('jadwal/dosen_index') ?>" class="hex-content">
                                      <span class="hex-content-inner">
                                          <span class="icon">
                                              <i class="fa fa-street-view"></i>
                                          </span>
                                          <span class="title">DOSEN</span>
                                      </span>
                                      <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                  </a>
                              </div>

                              <div class="hexagon-item">
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <a href="<?php echo base_url() . 'jadwal/jadwal_tabel_ruangan/Senin/' ?>" class="hex-content">
                                      <span class="hex-content-inner">
                                          <span class="icon">
                                              <i class="fa fa-university"></i>
                                          </span>
                                          <span class="title">RUANGAN</span>
                                      </span>
                                      <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                  </a>
                              </div>

                              <div class="hexagon-item">
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <div class="hex-item">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>
                                  <a href="<?php echo base_url('jadwal/jadwal_aktif') ?>" class="hex-content">
                                      <span class="hex-content-inner">
                                          <span class="icon">
                                              <i class="fa fa-clock"></i>
                                          </span>
                                          <span class="title">AKTIF <span class="badge badge-danger">New</span></span>
                                      </span>
                                      <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                  </a>
                              </div>

                        </div>
                        
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <!-- item tambahan -->

            <div class="col-sm-12">
              <div class="hexagon-menu clear">

                    <div class="hexagon-item">
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <a href="<?php echo base_url() . 'jadwal_18a3' ?>" class="hex-content">
                            <span class="hex-content-inner">
                                <span class="icon">
                                    <i class="fa fa-universal-access"></i>
                                </span>
                                <span class="title">Khusus TI18A3</span>
                            </span>
                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                        </a>
                    </div>

                    <div class="hexagon-item">
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <a href="https://github.com/widibaka/jadwal-fikom-udb" class="hex-content" target="_blank">
                            <span class="hex-content-inner">
                                <span class="icon">
                                    <i class="fab fa-github-alt"></i>
                                </span>
                                <span class="title">Github</span>
                            </span>
                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                        </a>
                    </div>

                    <div class="hexagon-item">
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <a href="https://wa.me/+6281226203761" class="hex-content" target="_blank">
                            <span class="hex-content-inner">
                                <span class="icon">
                                    <i class="fab fa-whatsapp"></i>
                                </span>
                                <span class="title">WA Admin</span>
                            </span>
                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                        </a>
                    </div>

              </div>
            </div>

            <br>
            <br>
            <br>
            <!-- settings -->

            <div class="col-sm-12">
              <div class="hexagon-menu clear">

                    <div class="hexagon-item">
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="hex-item">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <a href="<?php echo base_url() . 'jadwal/background' ?>" class="hex-content">
                            <span class="hex-content-inner">
                                <span class="icon">
                                    <i class="fa fa-edit"></i>
                                </span>
                                <span class="title">Ubah Background</span>
                            </span>
                            <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                        </a>
                    </div>

              </div>
            </div>
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal_download" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> Download Versi PC </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12 mb-3">
            <img src="<?php echo base_url() . 'download/snapshot.jpg' ?>" style="width: 100%">
          </div>
          <p>Kini telah hadir browser ringan untuk PC / laptop dan membuat semakin mudah mengakses jadwal.</p>
          <div class="col-sm-12 btn-group">
              <a href="<?php echo base_url() . 'download/Setup.exe' ?>" class="btn btn-default btn-lg p-3">
                <i class="fa fa-download mr-2"></i>
                 DOWNLOAD
              </a>
          </div>
        </div>
        <div>
          <button type="button" class="btn btn-sm btn-secondary float-right mb-3 mr-3" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>