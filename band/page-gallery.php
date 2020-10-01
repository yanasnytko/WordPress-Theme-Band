<?php get_header() ?>

<main class="main-content">
  <div class="fullwidth-block gallery">
    <div class="container">
      <div class="content fullwidth">
        <h2 class="entry-title">Gallery</h2>
        <div class="filter-links filterable-nav">

          <select class="mobile-filter">
            <option value="*">Show all</option>
            <?php
            $terms = get_terms(array(
              'taxonomy' => 'media_category',
              'orderby' => 'slug',
              'hide_empty' => false,
            ));
            ?>
            <?php foreach ($terms as $term) :
              $term_slug = $term->slug;
              echo $terms;
            ?>
            <option value=".<?= $term_slug; ?>"><?= $term_slug; ?></option>
            <?php endforeach ?>
          </select>

          <a href="#" class="current" data-filter="*">Show all</a>
          <?php foreach ($terms as $term) :
            $term_slug = $term->slug;
          ?>
          <a href="#" data-filter=".<?= $term_slug; ?>"><?= $term_slug; ?></a>
          <?php endforeach ?>
        </div>

        <div class="filterable-items">
          <?php
          $images = get_field('gallery');
          if ($images) : ?>
          <?php foreach ($images as $image) :
              $terms = wp_get_post_terms($image["id"], "media_category");
              $termsId = "";
              foreach ($terms as $term) {
                $termsId = $term->slug;
            ?>
          <div class="filterable-item <?= $termsId; ?>">
            <?php } ?>
            <a href="<?= esc_url($image['url']); ?>">
              <figure>
                <img src=" <?= esc_url($image['url']); ?>" alt="" />
              </figure>
            </a>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- .testimonial-section -->
</main>
<!-- .main-content -->

<?php get_footer() ?>