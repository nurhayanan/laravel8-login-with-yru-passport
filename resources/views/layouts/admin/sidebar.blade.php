
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">

		<i class="fas fa-laptop-code fa-1x" ></i>
      <span class="brand-text font-weight-light">ระบบฐานข้อมูลวิจัย</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

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
                <a href="/admin/year" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ปีงบประมาณ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/funding" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แหล่งทุน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/agency" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>หน่วยงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/researchtype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ประเภทการวิจัย</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/strategic" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ยุทธศาสตร์</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/issuess" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ประเด็นการวิจัย</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/researchfield" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สาขาการวิจัย</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/announce" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                ประกาศรับทุน
              </p>
            </a>
          </li>
        </ul>
      </nav>
	@show
		<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
