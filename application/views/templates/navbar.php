  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark" style="border-bottom: solid #333 1px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>assets/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Pengumuman</span>
          <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item ">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <p class="text-sm">Fitur baru, Progress bar waktu berlangsung</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 11 Okt 2020</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <a href="#" class="dropdown-item ">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <p class="text-sm">Jadwal Versi Desktop ver.0</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 1 Sept 2020</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <a href="#" class="dropdown-item ">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <p class="text-sm">Fitur baru ubah background</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 30 Sept 2020</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <a href="#" class="dropdown-item ">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <p class="text-sm">Perubahan tema dan algoritma ajax</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 28 Sept 2020</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>


  <!-- /.navbar -->

<!-- Alert -->
  <div class="col-sm-12 text-warning" id="alert-container">
    <?php echo $this->session->flashdata('alert');  ?>
  </div>
  <br>