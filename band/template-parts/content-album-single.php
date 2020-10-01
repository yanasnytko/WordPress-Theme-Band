<figure class="cover">
  <!-- <img src="dummy/thumbnail-1.jpg" alt="thumbnail 1" /> -->
  <?php the_post_thumbnail() ?>
</figure>
<div class="detail">
  <h3>
    <?php $lien = get_permalink(); ?>
    <a href="<?php echo $lien ?>"><?php the_title(); ?></a>
  </h3>
  <span class="author">By <?php the_field("album_author"); ?></span>
  <span class="year"><?php the_field("album_year"); ?></span>
  <span class="track"><?php the_field("album_tracks"); ?></span>
  <p>
    <?php the_excerpt(); ?>
  </p>
</div>