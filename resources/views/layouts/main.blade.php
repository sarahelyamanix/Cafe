<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      @include('includes.header')
      <div class="tm-right">
        <main class="tm-main">
          <div id="drink" class="tm-page-content">
            @yield('content')

            <!-- Drink Menu Page -->
            <!-- end Drink Menu Page -->
          </div>

          <!-- end Contact Page -->
        </main>
      </div>    
    </div>
    @include('includes.footer')
</div>

<!-- Background video -->
@include('includes.backgroundVideo')
  
</body>
</html>