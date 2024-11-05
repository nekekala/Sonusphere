<?php
/**
 * The template for displaying the footer.
 */
?>

		<footer class="site-footer">
			<div class="container">
				<div class="footer-content">
					<h3>Sonusphere</h3>
					<p>Group based in Berlin, Germany<br>
					Email: info@example.com<br>
					Phone: +1234567890</p>
				</div>
			</div>
			<div class="social-media-icons">
				<a href="https://facebook.com/yourpage" target="_blank">
					<i class="fa fa-facebook"></i> <!-- Font Awesome Facebook icon -->
				</a>
				<a href="https://twitter.com/yourpage" target="_blank">
					<i class="fa fa-twitter"></i> <!-- Font Awesome Twitter icon -->
				</a>
				<a href="https://instagram.com/yourpage" target="_blank">
					<i class="fa fa-instagram"></i> <!-- Font Awesome Instagram icon -->
				</a>
				<a href="https://linkedin.com/in/yourprofile" target="_blank">
					<i class="fa fa-linkedin"></i> <!-- Font Awesome LinkedIn icon -->
				</a>
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
