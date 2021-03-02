<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  {{-- <link href="img/logo/IconLogo.png" rel="icon"> --}}
  <title>@yield('title')</title>
  <link href="{{url('fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
        {{-- <div class="sidebar-brand-icon">
        <img src="img/logo/IconLogo.png">
        </div> --}}
        <div class="sidebar-brand-text mx-3">a</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        <!--Features-->
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-address-card" aria-hidden="true"></i>
          <span>Akun</span>
        </a>         
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Akun</h6>
            <a class="collapse-item" href="kader">Pembeli</a>
            <a class="collapse-item" href="admin_puskesmas">Admin</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-syringe"></i>
          <span>Data Barang</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="imunisasi">Barang</a>
            <a class="collapse-item" href="imunisasi">Jenis Barang</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gizi">
          <i class="fas fa-weight"></i>
          <span>Data Penjualan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gizi">
          <i class="fas fa-weight"></i>
          <span>Konfirmasi Pembelian</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="gizi">
          <i class="fas fa-weight"></i>
          <span>Notifikasi</span>
        </a>
      </li>  
    </ul>
    
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
             
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                    </div>
                  </div>
                </form>
              </div>
            </li>
                        
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="ml-2 d-none d-lg-inline text-white small"> 
                setting
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        
          @yield('content') 
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Batik Paoman</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah Anda Ingin logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="/logout" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>
                copyright &copy; <script> document.write(new Date().getFullYear()); </script> 
                Batik Paoman
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>
 <!-- Scroll to top -->
 <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<script src="{{url('assets/js/ruang-admin.min.js')}}"></script>
 <!-- Page level plugins -->
<script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('assets/vendor/chart.js/Chart.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{url('assets/js/demo/chart-pie.js')}}"></script>
<script src="{{url('assets/js/demo/chart-bar.js')}}"></script>
<script src="{{url('assets/vendor/select2/dist/js/select2.min.js')}}"></script>

<!-- Page level custom scripts -->
@yield('js')
  <script src="{{url('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>
</html>