<div class="event">
  <div class="entry-date">
    <div class="date"><?php echo get_the_date("d"); ?></div>
    <span class="month"><?php echo get_the_date("M"); ?></span>
  </div>
  <h2 class="entry-title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h2>
  <p>
    <?php the_excerpt(); ?>
  </p>
</div>
<!-- .event -->