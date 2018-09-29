			</article>
		</div>

	</main>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script src="<?= get_template_directory_uri(); ?>/dist/app.min.js"></script>

	<?php
	if(!is_user_logged_in()) {
	?>
		<!-- Analytics tracking code omitted for privacy -->
	<?php
	}

	wp_footer();
	?>

</body>
</html>