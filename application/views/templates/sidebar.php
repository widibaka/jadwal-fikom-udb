
  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/_jadwal/logo.png"
             alt="Koreksoft Logo"
             class="brand-image"
             style="opacity: .8;">
        <span class="brand-text font-weight-light">Koreksoft</span>
      </a>

      
        <!-- Sidebar -->
        <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <?php foreach ($sidebar as $key => $value): ?>
                <?php 
                $active = '';
                if ( $key == $title ) {
                  $active = 'active';
                } 
                ?>

                <?php if ( $value != 'pisahkan' ): ?>
                  <li class="nav-item has-treeview" >
                    <a href="<?= $value ?>" class="nav-link <?= $active ?>">
                      <i class="nav-icon far fa-circle text-warning"></i>
                      <p>
                        <?php echo $key; ?>
                      </p>
                    </a>
                  </li>
                <?php else: ?>
                  <div style="border-bottom: solid #666 1px"></div>
                <?php endif ?>
                
              <?php endforeach ?>
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      <!-- /.sidebar -->
    </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #282c31">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">