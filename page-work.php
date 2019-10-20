<?php get_header(); ?>

<main class="work-page" id="main" role="main">
  <h1 class="visually-hidden">Work</h1>

  <div class="tabs has-text-centered" role="tablist" aria-label="categories">
    <button id="all-button" class="tag is-light" role="tab" aria-selected="true" aria-controls="all-panel">All</button>
    <button id="code-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="code-panel" tabindex="-1">Code</button>
    <button id="creative-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="creative-panel" tabindex="-1">Creative</button>
    <button id="electronics-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="electronics-panel" tabindex="-1">Electronics</button>
    <button id="fabrication-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="fabrication-panel" tabindex="-1">Fabrication</button>
    <button id="teaching-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="teaching-panel" tabindex="-1">Teaching</button>
  </div>

  <div role="tabpanel" id="all-panel" class="is-active" aria-labelledby="all-button" tabindex="0">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="code-panel" aria-labelledby="code-button" tabindex="0">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="creative-panel" aria-labelledby="creative-button" tabindex="0">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="electronics-panel" aria-labelledby="electronics-button" tabindex="0">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="fabrication-panel" aria-labelledby="fabrication-button" tabindex="0">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="teaching-panel" aria-labelledby="teaching-button" tabindex="0">
    <ul class="tiles"></ul>
  </div>
</main>

<?php get_footer(); ?>