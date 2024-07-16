<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.tm-tab-link').on('click', function(e) {
      e.preventDefault();
      var targetId = $(this).attr('href'); // Get target ID from href attribute
      $('.tm-tab-content').hide(); // Hide all tab contents
      $(targetId).show(); // Show target tab content
    });

    // Show the first tab content by default
    $('.tm-tab-content:first').show();
  });
</script>


<footer class="tm-site-footer">
    <p class="tm-black-bg tm-footer-text">Copyright 2020 Wave Cafe
    
    | Design: <a href="https://www.tooplate.com" class="tm-footer-link" rel="sponsored" target="_parent">Tooplate</a></p>
  </footer>