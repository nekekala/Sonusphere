<?php
/**
 * The template for displaying the footer.
 */
?>

		<footer class="site-footer">
			<div class="footer-container">
				<div class="footer-content">
					<h3>Sonusphere</h3>
					<p>Group based in Berlin, Germany<br>
					Email: info@example.com<br>
					Phone: +1234567890</p>
				</div>
				<div class="social-media-icons">
					<a href="https://www.facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
					<a href="https://soundcloud.com/" target="_blank" class="social-icon"><i class="fa-brands fa-soundcloud" style="color: #f59b00;"></i></a>			
					<a href="https://www.youtube.com/" target="_blank" class="social-icon"><i class="fa-brands fa-youtube" style="color: #da2f10;"></i></a>			

					
				</div>
			</div>
			
			<div class="footer-copyright">
				<span class= "signature">Developed by <a href="https:/www.linkedin.com/in/grigorispoulos" rel="Neke Kala"> Neke Kala</a> - Creative Commons</span>
			</div>
		</footer>

	<?php wp_footer(); ?>

	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
	<script>
		window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
		ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
	</script>
	<?php // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript ?>
	<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
