<section class="testimonials" id="testimonials">
	<div class="container">
		<?php if ($title = get_field('ttm_title')) : ?>
			<h2 class="testimonials__title main_title"><?= esc_html($title); ?></h2>
		<?php endif; ?>
		<div class="testimonials__content">

		<?php
			$testimonials = new WP_Query(array(
				'post_type' => 'testimonials', 
				'posts_per_page' => -1,
				'orderby' => 'date',
				'order' => 'ASC'
			));
			if($testimonials->have_posts()):
				while($testimonials->have_posts()): $testimonials->the_post(); ?>
				<div class="testimonials__content_card">
					<p class="testimonials__card_text"><?= esc_html(get_field('testimonials_text')); ?></p>
					<div class="testimonials__card_author">
						<?php $avatar = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>
						<img src="<?= esc_url($avatar ?: get_template_directory_uri() . '/img/john-doe-avatar.jpg'); ?>" alt="customer avatar" loading="lazy" width="48" height="48">
						<div class="testimonials__author_info">
							<strong class="testimonials__info_name"><?= esc_html(the_title()); ?></strong>
							<span class="testimonials__info_description"><?= esc_html(the_field('testimonials_description')); ?></span>
						</div>
					</div>
				</div>
			<?php  endwhile;
			wp_reset_postdata();
		endif;
		?>

		</div>
	</div>
</section><!-- /.testimonials -->