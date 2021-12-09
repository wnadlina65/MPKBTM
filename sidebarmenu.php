<?php
    session_start();

	if(empty($_SESSION))
	{  	
	header('Location:index.php');
	}
?>
<!-- Sidebar -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
            <img class="icon-circle" src="img/majlis-perbandaran-kuantan-300x262_esW.png">
        </div>

        <div class="text-white font-weight-bolder">MPK</div>

      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Home -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">

        <i class="fas fa-home"></i>
          <span style="font-size: 100%" class="h1 text-black-50 font-weight-bold">LAMAN UTAMA</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Interface
      </div> -->

      <!-- Nav Item - Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuratMasuk" aria-expanded="true" aria-controls="collapseSuratMasuk">
          <i class="fas fa-inbox"></i>
            <span style="font-size: 90%" class="h1 text-black-50 font-weight-bold">SURAT MASUK</span>
        </a>
        <div id="collapseSuratMasuk" class="collapse" aria-labelledby="headingSuratMasuk" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="surat_masuk.php">Senarai Surat Masuk</a>
              <a class="collapse-item" href="Tambah_surat_masuk.php">Tambah Surat Masuk</a>
              
          </div>
        </div>
      </li>

      <!-- Nav Item - Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuratKeluar" aria-expanded="true" aria-controls="collapseSuratKeluar">
          <i class="fas fa-envelope"></i>
          <span style="font-size: 90%" class="h1 text-black-50 font-weight-bold">SURAT KELUAR</span>
        </a>
        <div id="collapseSuratKeluar" class="collapse" aria-labelledby="headingSuratKeluar" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="surat_keluar.php">Senarai Surat Keluar</a>
            <a class="collapse-item" href="Tambah_surat_keluar.php">Tambah Surat Keluar</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Collapse Menu -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMPK" aria-expanded="true" aria-controls="collapseMPK">
       <i class="fas fa-building"></i>
         <span style="font-size: 90%" class="h1 text-black-50 font-weight-bold">MPK</span>
       </a>
       <div id="collapseMPK" class="collapse" aria-labelledby="headingMPK" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">  
           <a class="collapse-item" href="jabatan.php">Senarai Jabatan</a>
           <a class="collapse-item" href="Tambah_jabatan.php">Tambah Jabatan</a>
           <a class="collapse-item" href="bahagian.php">Senarai Bahagian</a>
           <a class="collapse-item" href="Tambah_bahagian.php">Tambah Bahagian</a>
           <a class="collapse-item" href="jawatan.php">Senarai Jawatan</a>
           <a class="collapse-item" href="Tambah_jawatan.php">Tambah Jawatan</a>
           <a class="collapse-item" href="pekerja.php">Senarai Pekerja</a>
           <a class="collapse-item" href="Tambah_pekerja.php">Tambah Pekerja</a>
         </div>
       </div>
     </li>

     <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>

          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Carian..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-info" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class=" d-none d-sm-block"></div>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="text">Welcome <?php echo $_SESSION['staffName'];?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                    Log Keluar
                  </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
