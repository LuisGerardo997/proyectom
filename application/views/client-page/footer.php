<script src="<?= base_url(); ?>assets/js/jqBootstrapValidation.js"></script>
<script src="<?= base_url(); ?>assets/js/contact_me.js"></script>
<!-- /contact form -->
<!-- Calendar -->
    <script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
    <script>
        $(function() {
          $( "#datepicker1,#datepicker2" ).datepicker({
            dateFormat: "yy-mm-dd"
          });
        });
    </script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/swipebox.css">
        <script src="<?= base_url(); ?>assets/js/jquery.swipebox.min.js"></script>
          <script type="<?= base_url(); ?>assets/text/javascript">
            jQuery(function($) {
              $(".swipebox").swipebox();
            });
          </script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
        <script defer src="<?= base_url(); ?>assets/js/jquery.flexslider.js"></script>
        <script type="text/javascript">
        $(window).load(function(){
          $('.flexslider').flexslider({
          animation: "slide",
          start: function(slider){
            $('body').removeClass('loading');
          }
          });
        });
        </script>
      <!-- //flexSlider -->
<script src="<?= base_url(); ?>assets/js/responsiveslides.min.js"></script>
      <script>
            // You can also use "$(window).load(function() {"
            $(function () {
              // Slideshow 4
              $("#slider4").responsiveSlides({
              auto: true,
              pager:true,
              nav:false,
              speed: 500,
              namespace: "callbacks",
              before: function () {
                $('.events').append("<li>before event fired.</li>");
              },
              after: function () {
                $('.events').append("<li>after event fired.</li>");
              }
              });

            });
      </script>
    <!--search-bar-->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
<!--//search-bar-->
<!--tabs-->
<script src="<?= base_url(); ?>assets/js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default',
width: 'auto',
fit: true,
closed: 'accordion',
activate: function(event) {
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
  <script type="text/javascript">
    $(document).ready(function() {
    $().UItoTop({ easingType: 'easeOutQuart' });
    });
  </script>

  <div class="arr-ls">
  <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  </div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-3.1.1.min.js"></script>
</body>
</html>
