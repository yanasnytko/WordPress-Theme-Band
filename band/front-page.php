<?php get_header() ?>
<?php while (have_posts()) : the_post(); ?>

<!--Le contenu de la page index.html sans le header et sans le footer -->
<div class="hero">
  <div class="slider">
    <?php get_template_part("template-parts/content-slider", "single"); ?>
  </div>
</div>

<main class="main-content">
  <div class="fullwidth-block testimonial-section">
    <div class="container">
      <div class="quote-slider">
        <?php get_template_part("template-parts/content-quote", "single"); ?>
      </div>
    </div>
  </div>
  <!-- .testimonial-section -->

  <div class="fullwidth-block upcoming-event-section" data-bg-color="#191919">
    <div class="container">
      <header class="section-header">
        <h2 class="section-title">Upcoming events</h2>

        <div class="event-nav">
          <a class="prev" id="event-prev" href="#">
            <i class="fa fa-caret-left"></i>
          </a>
          <a class="next" id="event-next" href="#">
            <i class="fa fa-caret-right"></i>
          </a>
        </div>
        <!-- .event-nav -->
      </header>
      <!-- .section-header -->
      <div class="event-carousel">
        <?php
          $args = array('post_type' => 'post');
          $event = new WP_Query($args);
          ?>

        <?php if ($event->have_posts()) : ?>
        <?php while ($event->have_posts()) : $event->the_post(); ?>
        <?php get_template_part("template-parts/content-event", "single") ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

      </div>
      <!-- .event-carousel -->
    </div>
    <!-- .container -->
  </div>
  <!-- .upcoming-event-section -->

  <div class="fullwidth-block why-chooseus-section">
    <div class="container">
      <h2 class="section-title">Why choose us?</h2>

      <div class="row">

        <?php get_template_part("template-parts/content-why", "single"); ?>

      </div>
    </div>
    <!-- .container -->
  </div>
  <!-- .why-chooseus-section -->
</main>
<!-- .main-content -->

<?php endwhile; ?>
<?php get_footer() ?>