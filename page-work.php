<?php get_header(); ?>

<main class="work-page" id="main" tabindex="-1">
  <h1 class="visually-hidden">Work</h1>

  <div class="tabs-wrapper">
    <div class="tabs has-text-centered" role="tablist" aria-label="categories">
      <button id="all-button" class="tag is-light" role="tab" aria-selected="true" aria-controls="all-panel">All</button>
      <button id="code-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="code-panel">Code</button>
      <button id="creative-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="creative-panel">Creative</button>
      <button id="electronics-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="electronics-panel">Electronics</button>
      <button id="fabrication-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="fabrication-panel">Fabrication</button>
      <button id="teaching-button" class="tag is-light" role="tab" aria-selected="false" aria-controls="teaching-panel">Teaching</button>
    </div>
  </div>

  <div role="tabpanel" id="all-panel" class="is-active" aria-labelledby="all-button">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="code-panel" aria-labelledby="code-button">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="creative-panel" aria-labelledby="creative-button">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="electronics-panel" aria-labelledby="electronics-button">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="fabrication-panel" aria-labelledby="fabrication-button">
    <ul class="tiles"></ul>
  </div>

  <div role="tabpanel" id="teaching-panel" aria-labelledby="teaching-button">
    <ul class="tiles"></ul>
  </div>
</main>

<?php get_footer(); ?>