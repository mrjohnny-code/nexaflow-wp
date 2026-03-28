<section class="howitworks" id="howitworks">
	<div class="container">
		<?php if ($title = get_field('hiw_title')) : ?>
			<h2 class="howitworks__title main_title"><?= esc_html($title); ?></h2>
		<?php endif; ?>
		
		<div class="howitworks__cards">
			<?php
				$howitworks = new WP_Query(array(
					'post_type' => 'howitworks', 
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order' => 'ASC'
				));
				if($howitworks->have_posts()):
					while($howitworks->have_posts()): $howitworks->the_post(); ?>
					<div class="howitworks__card">
						<span class="howitworks__card_suptitle"><?= esc_html(get_field('icon')); ?></span>
						<h3 class="howitworks__card_title"><?= esc_html(get_the_title()); ?></h3>
						<p class="howitworks__card_text"><?= esc_html(get_field('text')); ?></p>
					</div>
				<?php  endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section><!-- /.howitworks -->