<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Personal website of Jason Webb - creative technologist, UI developer, hardware engineer and lover of learning focused on unconventional applications of advanced and emerging technologies in creative contexts.">
  <meta name="author" content="Jason Webb">
  <link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/images/favicon.png" sizes="32x32">

  <title>
    <?php
		if( is_front_page() ) {
			echo "Jason Webb";
		} else {
			wp_title('-','true','right');
		}
	?>
  </title>

  <link href="//cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css" rel="stylesheet">
  <link href="//maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css" rel="stylesheet">
  <link href="<?= get_template_directory_uri(); ?>/dist/styles.min.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body>
  <nav class="mobile-menu">
    <ul class="primary-pages">
      <li><a href="/about">About</a></li>
      <li><a href="/work">Work</a></li>
      <li><a href="/resume">Resum&eacute;</a></li>
      <li><a href="/contact">Contact</a></li>
    </ul>

    <ul class="external-sites">
      <li><a href="http://twitter.com/jasonwebb" target="_blank" title="@jasonwebb on Twitter"><span class="fa fa-twitter"></span>Twitter</a></li>
      <li><a href="https://www.instagram.com/zenwebb/" target="_blank" title="@zenwebb on Instagram"><span class="fa fa-instagram"></span>Instagram</a></li>
      <li><a href="http://github.com/jasonwebb" target="_blank" title="jasonwebb on Github"><span class="fa fa-github"></span>Github</a></li>
      <li><a href="https://www.pinterest.com/jasonw2368/" target="_blank" title="jasonw2368 on Pinterest"><span class="fa fa-pinterest"></span>Pinterest</a></li>
    </ul>

    <span class="close-icon fa fa-times"></span>
  </nav>

  <header>
    <a href="/" class="name">Jason Webb</a>

    <nav>
      <ul class="social">
        <li><a href="http://twitter.com/jasonwebb" target="_blank" title="@jasonwebb on Twitter"><span class="fa fa-twitter"></span></a></li>
        <li><a href="https://www.instagram.com/zenwebb/" target="_blank" title="@zenwebb on Instagram"><span class="fa fa-instagram"></span></a></li>
        <li><a href="http://github.com/jasonwebb" target="_blank" title="jasonwebb on Github"><span class="fa fa-github"></span></a></li>
        <li><a href="https://www.pinterest.com/jasonw2368/" target="_blank" title="jasonw2368 on Pinterest"><span class="fa fa-pinterest"></span></a></li>
      </ul>

      <ul class="pages">
        <li><a href="/about">About</a></li>
        <li><a href="/work">Work</a></li>
        <li><a href="/resume">Resum&eacute;</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </nav>

    <span class="hamburger-icon is-hidden-desktop fa fa-bars"></span>

    <div class="tagline"><?php bloginfo("description"); ?></div>
  </header>

  <main>