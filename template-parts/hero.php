<?php
	$image = get_field('hero_image');

	$bg = '';
	if ($image && isset($image['url'])) {
		$bg = 'style="background-image: url(' . esc_url($image['url']) . ');"';
	}
?>

<section class="hero" id="hero" <?= $bg; ?>>
	<div class="container">
		<h1 class="hero__title"><?= esc_html(get_field('hero_title')); ?></h1>
		<p class="hero__subtitle"><?= esc_html(get_field('hero_subtitle')); ?></p>
		<a href="#eligibility-form" class="hero__button btn">
			<?= esc_html(get_field('hero_btn')); ?>
			<span class="material-symbols-outlined">arrow_forward</span>
		</a>
		<p class="hero__text"><?= esc_html(get_field('hero_text')); ?></p>
	</div>
</section><!-- /.hero -->