<section class="eligibility" id="eligibility">
	<div class="container">
		<?php if ($title = get_field('elgblty_title')) : ?>
			<h2 class="eligibility__title main_title"><?= esc_html($title); ?></h2>
		<?php endif; ?>
		<div class="eligibility__content">
			<div class="eligibility__content_left">
				<h3 class="eligibility__content_title"><?= esc_html(get_field('form_title') ?: 'Get Your Free Solar Quote'); ?></h3>

				<?= do_shortcode('[contact-form-7 id="122" html_class="eligibility__form" html_id="eligibility-form"]'); ?>

			</div>
			<div class="eligibility__content_right">
				<h3 class="eligibility__content_title"><?= esc_html(get_field('content_title') ?: 'Contact Information'); ?></h3>
				<div class="eligibility__content_contacts">
					<div class="eligibility__contacts_item">
						<span class="material-symbols-outlined">location_on</span>
						<p><?= esc_html(get_field('address')); ?></p>
					</div>
					<div class="eligibility__contacts_item">
						<span class="material-symbols-outlined">phone</span>
						<?php 
							$phone = get_field('phone');
							$phone_clean = preg_replace('/[^0-9+]/', '', $phone);
						?>
						<a href="tel:<?= esc_attr($phone_clean); ?>" class="eligibility__contacts_phone"><?= esc_html($phone); ?></a>
					</div>
					<div class="eligibility__contacts_item">
						<span class="material-symbols-outlined">mail</span>
						<?php $email = sanitize_email(get_field('email')); ?>
						<a href="mailto:<?= esc_attr($email); ?>" class="eligibility__contacts_mail"><?= esc_html($email); ?></a>
					</div>
					<span class="eligibility__bottom_text"><?= esc_html(get_field('bottom_text')); ?></span>
				</div>
			</div>
		</div>
	</div>
</section><!-- /.eligibility -->