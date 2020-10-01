<footer class="site-footer">
  <div class="container">
    <img src="<?php echo get_template_directory_uri(); ?>/dummy/logo-footer.png" alt="Site Name" />

    <address>
      <p>
        <?php the_field('band_adresse', 'option'); ?>
        <br />
        <a href="tel:<?php the_field('band_phone', 'option'); ?>"><?php the_field('band_phone', 'option'); ?></a>
        <br />
        <a href="mailto:<?php the_field('band_email', 'option'); ?>"><?php the_field('band_email', 'option'); ?></a>
      </p>
    </address>

    <form action="#" class="newsletter-form">
      <?php
      $newsletterID = get_field('band_newsletter');
      echo do_shortcode('[contact-form-7 id="' . $newsletterID . '" title="Newsletter"]')
      ?>
      <!-- <input type="submit" class="button cut-corner" value="Subscribe" /> -->
    </form>
    <!-- .newsletter-form -->

    <div class="social-links">
      <a href="<?php the_field('rs_facebook', 'option'); ?>"><i class="fa fa-facebook-square"></i></a>
      <a href="<?php the_field('rs_twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a>
      <a href="<?php the_field('rs_gg', 'option'); ?>"><i class="fa fa-google-plus"></i></a>
      <a href="<?php the_field('rs_pinterest', 'option'); ?>"><i class="fa fa-pinterest"></i></a>
    </div>
    <!-- .social-links -->

    <p class="copy">
      <?php the_field('band_copyright', 'option'); ?>
    </p>
  </div>
</footer>
<!-- .site-footer -->
</div>
<!-- #site-content -->

<?php wp_footer(); ?>
</body>

</html>