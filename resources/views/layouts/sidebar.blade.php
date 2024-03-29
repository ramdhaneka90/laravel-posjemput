<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Request::is('/') ? 'Customer' : 'Operator' }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <!-- <li>
          <a href="/courier">
            <i class="fa fa-truck"></i> <span>Courier</span>
          </a>
        </li>

        <li>
          <a href="/offices">
            <i class="fa fa-share"></i> <span>Offices</span>
          </a>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="{{ url('/order') }}">
                    <i class="fa fa-circle-o"></i>
                   Approval
                </a>
            </li>

            <li>
                <a href="{{ url('/order-history') }}">
                    <i class="fa fa-circle-o"></i>
                    History
                </a>
            </li>
          </ul>
        </li>
        <!-- <li><a href="/users"><i class="fa fa-users"></i> <span>Users</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
