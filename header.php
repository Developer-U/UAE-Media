<?php
/**
 * The header for our theme
 *
 *
 * @package Blocksy
 */



?><!doctype html>
<html <?php language_attributes(); ?><?php echo blocksy_html_attr() ?>>

<head>
	<?php do_action('blocksy:head:start') ?>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php do_action('blocksy:head:end') ?>
</head>

<div?php ob_start(); blocksy_output_header(); $global_header=ob_get_clean(); ?>

	<body <?php body_class(); ?> <?php echo blocksy_body_attr() ?>>
		<a class="skip-link show-on-focus"
			href="<?php echo apply_filters('blocksy:head:skip-to-content:href', '#main') ?>">
			<?php echo __('Skip to content', 'blocksy'); ?>
		</a>

		<?php
		if (function_exists('wp_body_open')) {
			wp_body_open();
		}
		?>

		<?php
		$logo_color = get_field('logo_color', 'options');
		?>

		<header class="header">
			<div class="header__wrapper">
				<div class="container">
					<div
						class="header__top header-top header-top d-flex align-items-center align-items-sm-stretch justify-content-between">
						<button class="header__burger burger d-sm-none" aria-label="Открыть меню"
							data-popup-open="burger_menu">
							<svg width="32" height="21" viewBox="0 0 32 21" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M1 1H30.1493" stroke="#9A9A9A" stroke-width="2" stroke-linecap="round" />
								<path d="M1 10.3023H14.4179" stroke="#9A9A9A" stroke-width="2" stroke-linecap="round" />
								<path d="M1 19.6047H14.4179" stroke="#9A9A9A" stroke-width="2" stroke-linecap="round" />
								<path
									d="M29.416 16.9938C30.3856 15.6636 30.8199 14.0142 30.632 12.3758C30.444 10.7374 29.6477 9.23079 28.4023 8.15734C27.157 7.08388 25.5544 6.52278 23.9152 6.58628C22.276 6.64978 20.7211 7.3332 19.5615 8.49982C18.402 9.66644 17.7233 11.2302 17.6614 12.8783C17.5994 14.5264 18.1586 16.1372 19.2272 17.3886C20.2958 18.6399 21.7949 19.4394 23.4247 19.6272C25.0544 19.815 26.6946 19.3772 28.017 18.4013H28.016C28.0454 18.4416 28.0781 18.4802 28.1142 18.5171L30.2899 20.7048C30.4777 20.8937 30.7324 20.9999 30.998 21C31.2637 21.0001 31.5185 20.8941 31.7064 20.7053C31.8943 20.5166 31.9999 20.2605 32 19.9934C32.0001 19.7263 31.8947 19.4701 31.7069 19.2812L29.5312 17.0935C29.4954 17.0571 29.4569 17.0244 29.416 16.9938ZM29.6743 13.1237C29.6743 13.8509 29.5319 14.571 29.2551 15.2428C28.9783 15.9146 28.5726 16.5251 28.0612 17.0392C27.5498 17.5534 26.9426 17.9613 26.2744 18.2396C25.6061 18.5179 24.89 18.6611 24.1667 18.6611C23.4434 18.6611 22.7272 18.5179 22.059 18.2396C21.3908 17.9613 20.7836 17.5534 20.2722 17.0392C19.7607 16.5251 19.355 15.9146 19.0782 15.2428C18.8015 14.571 18.659 13.8509 18.659 13.1237C18.659 11.6551 19.2393 10.2467 20.2722 9.20821C21.3051 8.16975 22.706 7.58635 24.1667 7.58635C25.6274 7.58635 27.0283 8.16975 28.0612 9.20821C29.0941 10.2467 29.6743 11.6551 29.6743 13.1237Z"
									fill="#9A9A9A" />
							</svg>
						</button>

						<a 
						<?php if(get_locale() == 'en_US') { ?>
							href="/" 
						<?php } elseif(get_locale() == 'ar') { ?>
							href="/ar/"
						<?php } ?>						
						class="header__logo"
						>
							<?php
							if ($logo_color) { ?>
								<img src="<?php echo $logo_color['url']; ?>" alt="<?php echo $logo_color['alt']; ?>">
							<?php } ?>
						</a>

						<div class="header-top__right d-flex flex-column justify-content-between">
							<ul class="icons__language d-flex gap-3">
								<?php pll_the_languages(); ?>
							</ul>

							<!-- <ul class="header__icons icons d-block d-sm-grid">
								<li class="d-none d-sm-block">
									<button class="icons__item heart">
									</button>
								</li>
								<li>
									<button class="icons__item ring">
									</button>
								</li>
								<li class="d-none d-sm-block">
									<button class="icons__item user">
									</button>
								</li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
			<div class="header__wrapper">
				<div class="container">
					<div class="header__bottom header-bottom d-grid align-items-center justify-content-between">
						<button class="header__burger burger d-none d-sm-block" aria-label="Открыть меню"
							data-popup-open="burger_menu">
							<svg width="36" height="32" viewBox="0 0 36 32" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect width="35" height="32" transform="translate(1)" fill="white" />
								<path d="M1 6H30.1493" stroke="#9A9A9A" stroke-width="2" stroke-linecap="round" />
								<path d="M1 15.3023H14.4179" stroke="#9A9A9A" stroke-width="2" stroke-linecap="round" />
								<path d="M1 24.6046H14.4179" stroke="#9A9A9A" stroke-width="2" stroke-linecap="round" />
								<path
									d="M29.416 21.9938C30.3856 20.6635 30.8199 19.0142 30.632 17.3758C30.444 15.7374 29.6477 14.2308 28.4023 13.1573C27.157 12.0839 25.5544 11.5227 23.9152 11.5862C22.276 11.6497 20.7211 12.3332 19.5615 13.4998C18.402 14.6664 17.7233 16.2302 17.6614 17.8783C17.5994 19.5264 18.1586 21.1372 19.2272 22.3885C20.2958 23.6399 21.7949 24.4394 23.4247 24.6272C25.0544 24.815 26.6946 24.3771 28.017 23.4013H28.016C28.0454 23.4416 28.0781 23.4802 28.1142 23.5171L30.2899 25.7048C30.4777 25.8937 30.7324 25.9999 30.998 26C31.2637 26.0001 31.5185 25.8941 31.7064 25.7053C31.8943 25.5165 31.9999 25.2604 32 24.9934C32.0001 24.7263 31.8947 24.4701 31.7069 24.2812L29.5311 22.0935C29.4954 22.057 29.4569 22.0244 29.416 21.9938ZM29.6743 18.1237C29.6743 18.8509 29.5319 19.5709 29.2551 20.2428C28.9783 20.9146 28.5726 21.525 28.0612 22.0392C27.5498 22.5534 26.9426 22.9613 26.2744 23.2396C25.6061 23.5178 24.89 23.6611 24.1667 23.6611C23.4434 23.6611 22.7272 23.5178 22.059 23.2396C21.3908 22.9613 20.7836 22.5534 20.2722 22.0392C19.7607 21.525 19.355 20.9146 19.0782 20.2428C18.8015 19.5709 18.659 18.8509 18.659 18.1237C18.659 16.6551 19.2393 15.2466 20.2722 14.2082C21.3051 13.1697 22.706 12.5863 24.1667 12.5863C25.6274 12.5863 27.0283 13.1697 28.0612 14.2082C29.0941 15.2466 29.6743 16.6551 29.6743 18.1237Z"
									fill="#9A9A9A" />
							</svg>
						</button>

						<?php estore_primary_menu(); ?>
					</div>
				</div>
			</div>
		</header>