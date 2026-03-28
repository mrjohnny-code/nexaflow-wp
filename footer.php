</main><!-- /main -->

<footer class="footer">
	<div class="container">
		<div class="footer__top">
			<?php if ($title = get_field('footer_top_title')) : ?>
				<h3 class="footer__top_title"><?= esc_html($title); ?></h3>
			<?php endif; ?>
			<p class="footer__top_text"><?= esc_html(get_field('footer_top_text')); ?></p>
			<a href="#eligibility-form" class="footer__top_link btn">
				<?= esc_html(get_field('footer_top_btn')); ?>
				<span class="material-symbols-outlined">arrow_forward</span>
			</a>
		</div><!-- /.footer__top -->
		<div class="footer__body">
			<div class="footer__body_item">
				<a href="<?= esc_url(home_url('/')); ?>" class="footer__logo">
					<?php 
						if(function_exists('the_custom_logo')) {
							$custom_logo_id = get_theme_mod('custom_logo');
							$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

							if($logo) {
								echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '" loading="lazy" width="32" height="32">';
							}
						}
					?>
					<span><?= esc_html(get_bloginfo('name')); ?></span>
				</a>
				<p class="footer__body_text"><?= esc_html(get_field('footer_text')); ?></p>
			</div>
			<?php
				$columns = get_posts([
					'post_type' => 'footer_column',
					'numberposts' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC'
				]);
				foreach ($columns as $column) :
					$column_id = $column->ID;
			?>
			<div class="footer__body_item">
				<h4 class="footer__item_title"><?= esc_html(get_field('column_title', $column_id)); ?></h4>
				<ul class="footer__body_list">
					<?php
						$links = get_posts([
							'post_type' => 'footer_link',
							'numberposts' => -1,
							'meta_query' => [
								[
									'key' => 'parent_column',
									'value' => $column_id,
									'compare' => '=',
								]
							],
							'orderby' => 'menu_order',
							'order' => 'ASC'
						]);

						foreach ($links as $link) :
							$link_id = $link->ID;
					?>
					<?php 
						$url = get_field('link_url', $link_id);
						$text = get_field('link_text', $link_id);

						if ($url && $text) : ?>
							<li class="footer__list_item">
								<a href="<?= esc_url($url); ?>">
									<?= esc_html($text); ?>
								</a>
							</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endforeach; ?>
		</div><!-- /.footer__body -->
		<div class="footer__copyright"><?= esc_html(get_field('copyright')); ?></div>
	</div>
</footer><!-- /.footer -->
</div> <!-- /.wrapper -->
<?php wp_footer(); ?>
</body>
</html>