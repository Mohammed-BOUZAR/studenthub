	
	<!-- MOVE TO TOP BUTTON START-->

	<i class="fa fa-arrow-up cd-top" aria-hidden="true"></i>

	<!-- MOVE TO TOP BUTTON END -->
	
	<!-- Footer Section Start -->

	<section class="footer-section">
		<div class="container-fluid">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12 main-para-div">
						<p class="footer-main-heading">THANKS FOR VISITING US</p>
					</div>
					<div class="col-md-4">
						<p class="footer-para-heading">Address</p>
						<i class="fas fa-map-marker-alt footer-icons"></i>
						<p class="footer-sub-para">( UOS ) University Of Sahiwal,<br>Sahiwal, Punjab Pakistan</p>
					</div>
					<div class="col-md-4">
						<p class="footer-para-heading">Get In Touch</p>
						<p class="footer-sub-para"><i class="fas fa-mobile-alt footer-icons"></i>+92012 0123456</p>
						<p class="footer-sub-para"><i class="fas fa-fax footer-icons"></i>+0000 555 6789</p>
						<p class="footer-sub-para"><i class="far fa-envelope footer-icons mail-icon"></i>Info@Example.Com</p>
					</div>
					<div class="col-md-4">
						<p class="footer-para-heading">Our Timings</p>
						<p class="footer-sub-para"><i class="far fa-dot-circle footer-icons"></i>Monday - Friday</p>
						<p class="footer-sub-para"><i class="far fa-dot-circle footer-icons dot-icon2"></i>08:30 AM - 06:30 PM</p>
						<p class="footer-sub-para"><i class="far fa-dot-circle footer-icons dot-icon2"></i>Weakly Special Class</p>
						<p class="footer-sub-para"><i class="far fa-dot-circle footer-icons dot-icon4"></i>Parents Meeting</p>
					</div>
					<div class="col-sm-12 main-para-div2">
						<p class="footer-sub-para footer-last-para">&copy 2019 Student Hub. All Rights Reserved <span class="footer-line">|</span> Design by Muneeb Chaudhary</p>
						<a href="#"><i class="social-icons fab fa-facebook-f fb" aria-hidden="true"></i></a>
						<a href="#"><i class="social-icons fab fa-twitter tw" aria-hidden="true"></i></a>
						<a href="#"><i class="social-icons fab fa-instagram ig" aria-hidden="true"></i></a>
						<a href="#"><i class="social-icons fab fa-pinterest pin" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>		
	</section>	

	<!-- Footer section end -->

	<!-- SCRIPT LINKS Start -->

    <!-- <script type="text/javascript" src="/js/jquery-3.3.1.slim.min.js"></script> -->
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/SmoothScroll.min.js"></script>
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <!-- Back to to move -->
    <script type="text/javascript" src="/js/backtotop.js"></script>
    

	<!-- NAVBAR BACKGROUND COLOR CLASS ADD -->

	<script type="text/javascript">
		var scroll_start = 0;
		var startchange = $('.fixNavColor');
		var offset = startchange.offset();
		$(document).ready(function() {
		
		if (startchange.length){
		$(document).scroll(function() { 
		scroll_start = $(this).scrollTop();

		if(scroll_start > offset.top) {
		$('nav').addClass('fixClass');
		} 
		else{
		$('nav').removeClass('fixClass');
		}
		});
		}
		});
	</script>

<script>
if ( window.history.replaceState ) {
  	window.history.replaceState( null, null, window.location.href );
}
</script>