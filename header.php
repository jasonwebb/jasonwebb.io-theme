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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;500;700&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;500;700&display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css" rel="stylesheet">
  <link href="<?= get_template_directory_uri(); ?>/dist/styles.min.css" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <a href="#main" class="skip-to-main-link">
    <span>Skip to main content</span>
  </a>

  <button id="dark-mode-toggle-button--desktop" class="dark-mode-toggle-button">
    <div class="visually-hidden">Dark mode</div>

    <div class="light-text" aria-hidden="true">Light mode</div>
    <div class="dark-text" aria-hidden="true">Dark mode</div>

    <!-- SVG from Tom Miller on CodePen: https://codepen.io/creativeocean/pen/NWNrRdN -->
    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" width="25" height="25" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="#fff">
      <mask id="m">
        <circle class="masker" cx="7.5" cy="7.5" r="8.5" fill="#fff" />
      </mask>
      <g mask="url(#m)">
        <path class="sun" d="M7.5 1.5v-1m0 13.99v-.998m6-5.997h1m-13 0h-1m2-4.996l-1-1m12 0l-1 1m-10 9.993l-1 1m12 0l-1-1m-2-4.997a2.999 2.999 0 01-3 2.998 2.999 2.999 0 113-2.998z" />
      </g>
      <path class="moon" d="M1.66 11.362A6.5 6.5 0 007.693.502a7 7 0 11-6.031 10.86z" />
    </svg>
  </button>

  <div class="mobile-menu" role="dialog" aria-modal="true" aria-label="Mobile menu">
    <nav>
      <div class="close-button-wrapper">
        <button class="close-button first-focusable-element">
          <span class="fa fa-times" aria-hidden="true"></span>
          <span class="visually-hidden">Close menu</span>
        </button>
      </div>

      <div class="inner-wrapper">
        <ul class="primary-pages" aria-label="Pages">
          <li><a href="/about" <?php echo is_page('about') ? ' aria-current="page"' : ''; ?> ><span>About</span></a></li>
          <li><a href="/work" <?php echo is_page('work') ? ' aria-current="page"' : ''; ?> ><span>Work</span></a></li>
          <li><a href="/resume" <?php echo is_page('resume') ? ' aria-current="page"' : ''; ?> ><span>Resum&eacute;</span></a></li>
          <li><a href="/contact" <?php echo is_page('contact') ? ' aria-current="page"' : ''; ?> ><span>Contact</span></a></li>
        </ul>

        <ul class="external-sites" aria-label="Social media profiles">
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
      </div>
    </nav>
  </div>

  <header class="global-header">
    <a href="/" class="name" <?php echo is_home() ? ' aria-current="page"' : '' ?> >Jason Webb</a>

    <nav>
      <ul class="social" aria-label="Social media profiles">
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

      <ul class="pages" aria-label="Pages">
        <li>
          <a href="/about" <?php echo is_page('about') ? ' aria-current="page"' : ''; ?> >
            <span>About</span>
          </a>
        </li>

        <li>
          <a href="/work" <?php echo is_page('work') ? ' aria-current="page"' : ''; ?> >
            <span>Work</span>
          </a>
        </li>

        <li>
          <a href="/resume" <?php echo is_page('resume') ? ' aria-current="page"' : ''; ?> >
            <span>Resum&eacute;</span>
          </a>
        </li>

        <li>
          <a href="/contact" <?php echo is_page('contact') ? ' aria-current="page"' : ''; ?> >
            <span>Contact</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="mobile-buttons">
      <button id="dark-mode-toggle-button--mobile" class="dark-mode-toggle-button">
        <div class="visually-hidden">Dark mode</div>

        <!-- SVG from Tom Miller on CodePen: https://codepen.io/creativeocean/pen/NWNrRdN -->
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" width="25" height="25" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="#fff">
          <mask id="m">
            <circle class="masker" cx="7.5" cy="7.5" r="8.5" fill="#fff" />
          </mask>
          <g mask="url(#m)">
            <path class="sun" d="M7.5 1.5v-1m0 13.99v-.998m6-5.997h1m-13 0h-1m2-4.996l-1-1m12 0l-1 1m-10 9.993l-1 1m12 0l-1-1m-2-4.997a2.999 2.999 0 01-3 2.998 2.999 2.999 0 113-2.998z" />
          </g>
          <path class="moon" d="M1.66 11.362A6.5 6.5 0 007.693.502a7 7 0 11-6.031 10.86z" />
        </svg>
      </button>

      <button class="hamburger-icon is-hidden-desktop">
        <span class="fa fa-bars" aria-hidden="true"></span>
        <span class="visually-hidden">Open mobile menu</span>
      </button>
    </div>
  </header>