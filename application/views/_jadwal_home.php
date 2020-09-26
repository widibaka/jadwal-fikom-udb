
   
  <div class="col-sm-12 clear-fix">
    <div class="card" style="overflow: hidden; background-image: url(<?= base_url('assets/_jadwal/bg.jpg') ?>);
        background-position: center;
        background-attachment: fixed;
        background-size: cover;">
      <div class="card-header bg-dark" style="opacity: 0.9">
        <h3 class="card-title">02</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body bg-dark" style="opacity: 0.9">
        <div class="bg-dark pt-tablecell page-home relative">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title home text-center">
                          <span class="heading-page">Selamat Datang
                          </span>
                            <p class="mt20">Pilih divisi kamu untuk melihat jadwal misi.</p>
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
                                  <a href="<?php echo base_url('jadwal/ruangan_index') ?>" class="hex-content">
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

                        <br>
                        <br>
                        <br>
                        
                    </div>
                </div>
            </div>
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
                        <a href="https://github.com/widibaka/jadwal-fikom-udb" class="hex-content">
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
                        <a href="https://wa.me/+6281226203761" class="hex-content">
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
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  