<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Цэс</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ url()->current()==url('admin')?'active':'' }}">
                <a href="{{ url('admin') }}">
                    <i class='fa fa-home'></i> <span>Ерөнхий самбар</span>
                </a>
            </li>
            <li class="{{ url()->current()==url('admin/category')?'active':'' }}">
                <a href="{{ url('admin/category') }}">
                    <i class='fa fa-list-alt'></i> <span>Ангилал</span>
                </a>
            </li>
            <li class="{{ url()->current()==url('admin/post')?'active':'' }}">
                <a href="{{ url('admin/post') }}">
                    <i class='fa fa-pencil'></i> <span>Мэдээ мэдээлэл</span>
                </a>
            </li>
            <li class="{{ url()->current()==url('admin/user')?'active':'' }}">
                <a href="{{ url('admin/user') }}">
                    <i class='fa fa-group'></i> <span>Хэрэглэгч</span>
                </a>
            </li>
            <!--<li class="treeview">-->
            <!--    <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>-->
            <!--    <ul class="treeview-menu">-->
            <!--        <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>-->
            <!--        <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
