<?php get_header() ?>
<?php
$formulaireID = get_field('contact_name');
?>

<main class="main-content">
  <div class="fullwidth-block inner-content">
    <div class="container">
      <h2 class="page-title">Contact Us</h2>
      <div class="row">
        <div class="col-md-6">
          <?= do_shortcode('[contact-form-7 id="' . $formulaireID . '" title="Contact form 1" html_class="contact-form"]') ?>
        </div>



        <!-- carte -->
        <div class="col-md-6">
          <div class="map-wrapper">
            <?php the_field('map'); ?>
            <address>
              <div class="row">
                <div class="col-sm-6">
                  <strong><?php the_field('adresse_name'); ?>.</strong> <br>
                  <span><?php the_field('adresse_adresse'); ?></span>
                </div>
                <div class="col-sm-6">
                  <a href="mailto:<?php the_field('adresse_mail'); ?>">
                    <?php the_field('adresse_mail'); ?>
                  </a>
                  <br />
                  <a href="tel:<?php the_field('adresse_phone'); ?>"><?php the_field('adresse_phone'); ?></a>
                </div>
              </div>
            </address>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .testimonial-section -->
</main>
<!-- .main-content -->


<?php get_footer() ?>