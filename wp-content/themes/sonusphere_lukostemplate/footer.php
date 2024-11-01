<?php
/**
 * The template for displaying the footer.
 */
?>

		<footer class="site-footer">
			<div class="container">
				<div class="footer-content">
					<h2>Sonusphere</h2>
					<p>Group based in Berlin, Germany<br>
					Email: info@example.com<br>
					Phone: +1234567890</p>
				</div>
				<div class="footer-copyright">
					<h2><span class= "signature">Neke Kala</span> - Creative Commons</h2>
				</div>
			</div>
		</footer>
	</div>

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
