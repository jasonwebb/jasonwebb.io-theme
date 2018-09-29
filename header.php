<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php
		if( is_front_page() ) {
			echo "Jason Webb &mdash; creative technologist and UI developer";
		} else {
			wp_title('&mdash;','true','right');
		}
	?></title>

	<link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/images/favicon.png" sizes="32x32">
	<link href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet">
	<link href="<?= get_template_directory_uri(); ?>/dist/style.min.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body>
	<div class="overlay" role="complementary">
		<div class="inner">
			<a href="javascript:void(0)" class="close icon" aria-label="Close overlay">
				<i class="fa fa-close"></i>
			</a>

			<div class="container">
				<div class="columns is-centered is-gapless">
					<div class="column is-8 is-10-tablet content">
						<h2>Let's work together!</h2>

						<p>I'm on the hunt for <u>full-time opportunities</u> to build amazing things with awesome people. Here are just a few of the areas I could do great work in:</p>
						
						<ul>
							<li><strong>Interactive installations, experiences, and exhibit design and fabrication</strong> using advanced technologies including custom electronics, LEDs, sensors, 3D cameras, computer vision, procedural coding, projection mapping, and more.</li>
							<li><strong>Architectural research, prototyping, and project builds</strong> using modern and experimental digital fabrication techniques and processes, computational design, and hands-on studio-based methods.</li>
							<li><strong>Electronic product prototyping</strong> with Arduino, Eagle, CAD, and digital fabrication.</li>
							<li><strong>Teaching or academic research</strong> involving creative technology, digital fabrication, and/or the natural world.</li>
						</ul>

						<p>Relocation is not a problem for the right opportunity. If you think I may be a good fit for your team, or know of an opportunity that I should check out, send me a message!</p>
						
						<a href="/contact" class="button is-ghost send-message">
							<span class="icon">
								<i class="fa fa-envelope"></i>
							</span>
							Send me a message
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="pulldown-tab">
			<a href="javascript:void(0)">Work with me!</a>
		</div>
	</div>

	<main class="container">
		<header class="mobile-controls is-hidden-desktop is-clearfix">
			<a href="javascript:void(0)" class="hamburger js-open-mobile-menu icon" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu">
				<i class="fa fa-bars"></i>
			</a>			

			<form method="get" action="/" class="search is-clearfix" role="search">
				<a href="javascript:void(0)" class="icon" aria-label="Toggle site search" aria-controls="mobile-search" aria-expanded="false">
					<i class="fa fa-search"></i>
				</a>

				<div class="field" id="mobile-search">
					<label class="label" for="mobile-site-search-input">Search site</label>

					<div class="control">
						<input type="text" name="s" id="mobile-site-search-input" class="input is-rounded" placeholder="Search for ..." aria-label="Search the site">
					</div>
				</div>
			</form>

			<nav id="mobile-menu" role="navigation">
				<div class="mobile-menu-inner">
					<ul class="primary-pages">
						<li><a href="/about">About</a></li>
						<li><a href="/work">Work</a></li>
						<li><a href="/resume">Resumé</a></li>
						<li><a href="/blog">Blog</a></li>
						<li><a href="/contact">Contact</a></li>
					</ul>

					<ul class="external-sites">
						<li><a href="http://twitter.com/jasonwebb" target="_blank" title="@jasonwebb on Twitter">Twitter</a></li>
						<li><a href="https://www.instagram.com/zenwebb/" target="_blank" title="@zenwebb on Instagram">Instagram</a></li>
						<li><a href="http://github.com/jasonwebb" target="_blank" title="jasonwebb on Github">Github</a></li>
						<li><a href="http://www.instructables.com/member/zen.webb/" target="_blank" title="zen.webb on Instructables">Instructables</a></li>
						<li><a href="https://www.pinterest.com/jasonwebbmakes/" target="_blank" title="jasonwwebbmakes on Pinterest">Pinterest</a></li>
						<li><a href="https://www.thingiverse.com/jasonwebb/about" target="_blank" title="jasonwebb on Thingiverse">Thingiverse</a></li>
					</ul>
				</div>
			</nav>
		</header>

		<div class="columns is-centered is-variable">
			<aside class="sidebar column is-narrow">
				<div class="sidebar__inner">
					<a href="/" class="name is-uppercase">Jason Webb</a>

					<nav class="primary-nav" role="navigation">
						<ul>
							<li><a href="/about">About</a></li>
							<li><a href="/work">Work</a></li>
							<li><a href="/resume">Resumé</a></li>
							<li><a href="/blog">Blog</a></li>
							<li><a href="/contact">Contact</a></li>
						</ul>
					</nav>

					<nav class="secondary-nav">
						<ul>
							<li><a href="http://twitter.com/jasonwebb" target="_blank" title="@jasonwebb on Twitter">Twitter</a></li>
							<li><a href="https://www.instagram.com/zenwebb/" target="_blank" title="@zenwebb on Instagram">Instagram</a></li>
							<li><a href="http://github.com/jasonwebb" target="_blank" title="jasonwebb on Github">Github</a></li>
							<li><a href="http://www.instructables.com/member/zen.webb/" target="_blank" title="zen.webb on Instructables">Instructables</a></li>
							<li><a href="https://www.pinterest.com/jasonwebbmakes/" target="_blank" title="jasonwwebbmakes on Pinterest">Pinterest</a></li>
							<li><a href="https://www.thingiverse.com/jasonwebb/about" target="_blank" title="jasonwebb on Thingiverse">Thingiverse</a></li>
						</ul>
					</nav>
					
					<form method="get" action="/" class="search" role="search">
						<a href="javascript:void(0)" class="icon is-right is-small" aria-label="Toggle site search" aria-controls="desktop-search" aria-expanded="false">
							<i class="fa fa-search"></i>
						</a>

						<div class="field">
							<label class="label" for="site-search-input">Search site</label>

							<div class="control">
								<input type="text" name="s" id="site-search-input" class="input is-rounded" placeholder="Search for ..." aria-label="Search site">
							</div>
						</div>
					</form>
				</div>
			</aside>

			<article class="column is-12 is-12-tablet is-8-desktop content">