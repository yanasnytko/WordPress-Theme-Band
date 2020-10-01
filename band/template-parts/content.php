<main class="main-content">
  <div class="fullwidth-block inner-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content">
            <figure class="cover">
              <?php the_post_thumbnail() ?>
            </figure>
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <div class="detail">
              <span class="author"><?php the_field("album_author"); ?></span><br>
              <span class="year"><?php the_field("album_year"); ?></span><br>
              <span class="track"><?php the_field("album_tracks"); ?></span>
            </div>
            <?php the_content(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</main> <!-- .main-content -->