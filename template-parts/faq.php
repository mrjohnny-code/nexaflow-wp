<section class="faq" id="faq">
	<div class="container">
		<?php if ($title = get_field('faq_title')) : ?>
			<h2 class="faq__title main_title"><?= esc_html($title); ?></h2>
		<?php endif; ?>
		<div class="faq__content">

			<?php
				$faq = new WP_Query(array(
					'post_type' => 'faq', 
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order' => 'ASC'
				));
				if($faq->have_posts()):
					while($faq->have_posts()): $faq->the_post(); ?>
					<details class="faq__accordion">
						<summary class="faq__accordion_title"><?= esc_html(get_the_title()); ?></summary>
						<p class="faq__accordion_text"><?= esc_html(get_field('text')); ?></p>
					</details>
				<?php  endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section><!-- /.faq -->