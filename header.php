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
			the_title('',' - Jason Webb',true);
		}
	?>
  </title>


	<?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Roboto%20Mono:400,500&display=block">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto%20Mono:400,500&display=block">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css" rel="stylesheet">
  <link href="<?= get_template_directory_uri(); ?>/dist/styles.min.css" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <a href="#main" class="skip-to-main-link">
    <span>Skip to main content</span>
  </a>

  <nav class="mobile-menu" aria-label="mobile menu" role="dialog" aria-modal="true">
    <button class="close-button first-focusable-element">
      <span class="fa fa-times" aria-hidden="true"></span>
      <span class="visually-hidden">Close menu</span>
    </button>

    <ul class="primary-pages" aria-label="pages">
      <li><a href="/about"><span>About</span></a></li>
      <li><a href="/work"><span>Work</span></a></li>
      <li><a href="/resume"><span>Resum&eacute;</span></a></li>
      <li><a href="/contact"><span>Contact</span></a></li>
    </ul>

    <ul class="external-sites" aria-label="social media">
      <li>
        <a href="http://twitter.com/jasonwebb" target="_blank">
          <span class="fa fa-twitter" aria-hidden="true"></span>
          <span>Twitter</span>
        </a>
      </li>

      <li>
        <a href="https://www.instagram.com/zenwebb/" target="_blank">
          <span class="fa fa-instagram" aria-hidden="true"></span>
          <span>Instagram</span>
        </a>
      </li>

      <li>
        <a href="http://github.com/jasonwebb" target="_blank">
          <span class="fa fa-github" aria-hidden="true"></span>
          <span>Github</span>
        </a>
      </li>

      <li>
        <a href="https://medium.com/@jason.webb" target="_blank" class="last-focusable-element">
          <span class="fa fa-medium" aria-hidden="true"></span>
          <span>Medium</span>
        </a>
      </li>
    </ul>
  </nav>

  <header>
    <?php echo '<a href="/" class="name" aria-label="go to home page"', (is_home() ? ' aria-current="page"' : ''), '>Jason Webb</a>'; ?>

    <nav role="navigation">
      <ul class="social" aria-label="social media">
        <li>
          <a href="http://twitter.com/jasonwebb" target="_blank" title="@jasonwebb on Twitter">
            <span class="fa fa-twitter" aria-hidden="true"></span>
            <span class="visually-hidden">@jasonwebb on Twitter</span>
          </a>
        </li>

        <li>
          <a href="https://www.instagram.com/zenwebb/" target="_blank" title="@zenwebb on Instagram">
            <span class="fa fa-instagram" aria-hidden="true"></span>
            <span class="visually-hidden">@zenwebb on Instagram</span>
          </a>
        </li>

        <li>
          <a href="http://github.com/jasonwebb" target="_blank" title="jasonwebb on Github">
            <span class="fa fa-github" aria-hidden="true"></span>
            <span class="visually-hidden">jasonwebb on Github</span>
          </a>
        </li>

        <li>
          <a href="https://medium.com/@jason.webb" target="_blank" title="@jason.webb on Medium">
            <span class="fa fa-medium" aria-hidden="true"></span>
            <span class="visually-hidden">@jason.webb on Medium</span>
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

    <button class="hamburger-icon is-hidden-desktop">
      <span class="fa fa-bars" aria-hidden="true"></span>
      <span class="visually-hidden">Open mobile menu</span>
    </button>
  </header>