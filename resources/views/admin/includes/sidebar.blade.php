<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
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
            <li class="header">NAVEGACIÓN</li>
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="label bg-red">{{$customers}}</span><span>Clientes</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.customer.create')}}"><i class="fa fa-circle-o"></i> Crear Cliente</a></li>
                    <li><a href="{{route('admin.customer')}}"><i class="fa fa-circle-o"></i> Lista de clientes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <span class="label bg-red">{{$loans}}</span><span>Prestamos</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.loan.create')}}"><i class="fa fa-circle-o"></i> Crear Prestamo</a></li>
                    <li><a href="{{route('admin.loan')}}"><i class="fa fa-circle-o"></i> Lista de prestamos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="label bg-red">{{$payments}}</span><span>Pagos</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.payment.create')}}"><i class="fa fa-circle-o"></i> Crear Pago</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>