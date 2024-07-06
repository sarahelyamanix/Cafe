<!DOCTYPE html>
<html lang="en">
  <head>
    @include('dash_includes.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i></i> <span>Beverages Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('dash_includes.profile')
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->   
            @include('dash_includes.sidebar')
					<!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('dash_includes.menuFooter')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('dash_includes.topNav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        @include('dash_includes.footer')
        <!-- /footer content -->
      </div>
    </div>
    @include('dash_includes.footerJS')
  </body>
</html>