  <!-- Main Sidebar Container -->
  <aside class="main-sidebar" style="background-color: #CCCCCC">
    <!-- Brand Logo -->
    <a href="" class="brand-link"  style="background-color: #CCCCCC;">
      <img src="../../../images/btl_logo.png" alt="btl_logo" class="brand-image" style="position:relative; left: 20px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Priviléges
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/roles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles et permissions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/list')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('clients/list')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Clients
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('credits/list')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Crédits
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('avis/list')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Avis
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>