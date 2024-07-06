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
            <!-- Drink Menu Page -->
            @include('includes.menu')
            <!-- end Drink Menu Page -->
          </div>

          <!-- About Us Page -->
          @include('includes.about')

          <!-- end About Us Page -->

          <!-- Special Items Page -->
          @include('includes.specialItems')

          <!-- end Special Items Page -->

          <!-- Contact Page -->
          @include('includes.contact')

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