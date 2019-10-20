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
  <a href="#main" class="skip-to-main-link visually-hidden visually-hidden-focusable">
    <span>Skip to main content</span>
  </a>

  <nav class="mobile-menu" role="navigation" aria-label="mobile menu">
    <button class="close-button">
      <span class="fa fa-times" aria-hidden="true"></span>
      <span class="visually-hidden">Close menu</span>
    </button>

    <ul class="primary-pages">
      <li><a href="/about">About</a></li>
      <li><a href="/work">Work</a></li>
      <li><a href="/resume">Resum&eacute;</a></li>
      <li><a href="/contact">Contact</a></li>
    </ul>

    <ul class="external-sites">
      <li>
        <a href="http://twitter.com/jasonwebb" target="_blank">
          <span class="fa fa-twitter" aria-hidden="true"></span>
          Twitter
        </a>
      </li>

      <li>
        <a href="https://www.instagram.com/zenwebb/" target="_blank">
          <span class="fa fa-instagram" aria-hidden="true"></span>
          Instagram
        </a>
      </li>

      <li>
        <a href="http://github.com/jasonwebb" target="_blank">
          <span class="fa fa-github" aria-hidden="true"></span>
          Github
        </a>
      </li>

      <li>
        <a href="https://www.pinterest.com/jasonw2368/" target="_blank">
          <span class="fa fa-pinterest" aria-hidden="true"></span>
          Pinterest
        </a>
      </li>
    </ul>
  </nav>

  <header role="banner">
    <?php echo '<a href="/" class="name" aria-label="go to home page"', (is_home() ? ' aria-current="page"' : ''), '>Jason Webb</a>'; ?>

    <nav role="navigation">
      <ul class="social" aria-label="social media">
        <li>
          <a href="http://twitter.com/jasonwebb" target="_blank">
            <span class="fa fa-twitter" aria-hidden="true"></span>
            <span class="visually-hidden">@jasonwebb on Twitter</span>
          </a>
        </li>

        <li>
          <a href="https://www.instagram.com/zenwebb/" target="_blank">
            <span class="fa fa-instagram" aria-hidden="true"></span>
            <span class="visually-hidden">@zenwebb on Instagram</span>
          </a>
        </li>

        <li>
          <a href="http://github.com/jasonwebb" target="_blank">
            <span class="fa fa-github" aria-hidden="true"></span>
            <span class="visually-hidden">jasonwebb on Github</span>
          </a>
        </li>

        <li>
          <a href="https://www.pinterest.com/jasonw2368/" target="_blank">
            <span class="fa fa-pinterest" aria-hidden="true"></span>
            <span class="visually-hidden">jasonw2368 on Pinterest</span>
          </a>
        </li>
      </ul>

      <ul class="pages" aria-label="pages">
        <?php echo '<li', (is_page('about') ? ' aria-current="page"' : ''), '>'; ?>
          <a href="/about">
            <span>About</span>
          </a>
        </li>

        <?php echo '<li', (is_page('work') ? ' aria-current="page"' : ''), '>'; ?>
          <a href="/work">
            <span>Work</span>
          </a>
        </li>

        <?php echo '<li', (is_page('resume') ? ' aria-current="page"' : ''), '>'; ?>
          <a href="/resume">
            <span>Resum&eacute;</span>
          </a>
        </li>

        <?php echo '<li', (is_page('contact') ? ' aria-current="page"' : ''), '>'; ?>
          <a href="/contact">
            <span>Contact</span>
          </a>
        </li>
      </ul>
    </nav>

    <span class="hamburger-icon is-hidden-desktop fa fa-bars"></span>

    <div class="tagline"><?php bloginfo("description"); ?></div>
  </header>