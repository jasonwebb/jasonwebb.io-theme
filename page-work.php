<?php get_header(); ?>

<main class="work-page" id="main" role="main">
  <h1 class="visually-hidden">Work</h1>

  <nav class="controls has-text-centered" role="navigation" aria-label="Work categories">
    <div role="group" aria-label="Select category">
      <label>
        <input type="radio" name="category" value="">
        <span class="tag is-light">All</span>
      </label>

      <label>
        <input type="radio" name="category" value="code">
        <span class="tag is-light">Code</span>
      </label>

      <label>
        <input type="radio" name="category" value="creative">
        <span class="tag is-light">Creative</span>
      </label>

      <label>
        <input type="radio" name="category" value="electronics">
        <span class="tag is-light">Electronics</span>
      </label>

      <label>
        <input type="radio" name="category" value="fabrication">
        <span class="tag is-light">Fabrication</span>
      </label>

      <label>
        <input type="radio" name="category" value="teaching">
        <span class="tag is-light">Teaching</span>
      </label>
    </div>
  </nav>

  <section class="tiles" aria-live="polite" aria-atomic="true"></section>
</main>

<?php get_footer(); ?>