<section class="benefits" id="benefits">
	<div class="container">
		<?php if ($title = get_field('benefits_title')) : ?>
			<h2 class="benefits__title main_title"><?= esc_html($title); ?></h2>
		<?php endif; ?>

		<div class="benefits__cards">
			<?php
				$benefits = new WP_Query(array(
					'post_type' => 'benefit', 
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order' => 'ASC'
				));
				if($benefits->have_posts()):
					while($benefits->have_posts()): $benefits->the_post(); ?>
					<div class="benefits__card">
						<span class="material-symbols-outlined"><?= esc_html(get_field('icon')); ?></span>
						<h3 class="benefits__card_title"><?= esc_html(get_the_title()); ?></h3>
						<p class="benefits__card_text"><?= esc_html(get_field('text')); ?></p>
					</div>
				<?php  endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section><!-- /.benefits -->