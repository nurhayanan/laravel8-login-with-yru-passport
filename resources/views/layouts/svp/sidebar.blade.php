
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/svp/dashboard" class="brand-link">

		<i class="fas fa-laptop-code fa-1x" ></i>
      <span class="brand-text font-weight-light">ระบบฐานข้อมูลวิจัย</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>--> --}}
	@section('sidebar')
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ข้อมูลพื้นฐาน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ประกาศรับทุน</p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>โครงการ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/svp/contract" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>จัดทำสัญญา</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายงานความก้าวหน้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ติดตามงานวิจัย</p>
                </a>
              </li>
        </ul>
      </nav>
	@show
		<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
