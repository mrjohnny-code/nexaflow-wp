<section class="about" id="about">
	<div class="container">
		<?php if ($title = get_field('about_title')) : ?>
			<h2 class="about__title main_title"><?= esc_html($title); ?></h2>
		<?php endif; ?>
		<div class="about__content">
			<div class="about__content_left">
				<p><?= esc_html(get_field('about_text')); ?></p>
				<p class="strong"><?= esc_html(get_field('about_text_strong')); ?></p>
			</div>
			<div class="about__content_right">
				<img src="<?= esc_url(get_template_directory_uri() . '/img/canada-map_2.jpg'); ?>" alt="map of Canada" loading="lazy" width="696" height="562">
				<?php
					$locations = new WP_Query(array(
						'post_type' => 'location',
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => 'ASC',
					));

					if ($locations->have_posts()):
						while($locations->have_posts()): $locations->the_post(); ?>
				<div class="map_pin" data-loc="<?= esc_attr(get_field('data_loc')); ?>">
					<span class="material-symbols-outlined"><?= esc_html(get_field('icon') ?: 'location_on'); ?></span>
					<div class="map__tooltip">
						<h4 class="map__tooltip_title"><?= esc_html(get_the_title()); ?></h4>
						<p class="map__tooltip_text"><?= esc_html(get_field('text')); ?></p>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); endif; ?>
			</div>
		</div>
	</div>
</section><!-- /.about -->