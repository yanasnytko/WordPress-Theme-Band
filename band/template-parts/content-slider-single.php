<?php
$rows = get_field('main_slides');
if ($rows) {
  echo '<ul class="slides">';
  foreach ($rows as $row) {
    $image = $row['slide_image'];
    $title = $row['slide_title'];
    $subtitle = $row['slide_subtitle'];
    $description = $row['slide_description'];
    $link = $row['slide_link'];
    echo '<li class="lazy-bg" data-background="' . $image['url'] . '">';
    echo '<div class="container">';
    echo '<h2 class="slide-title">' . $title . '</h2>';
    echo '<h3 class="slide-subtitle">' . $subtitle . '</h3>';
    echo '<p class="slide-desc">' . $description . '</p>';
    echo '<a href="' . $link . '" class="button cut-corner">Read More</a>';
    echo '</div>';
    echo '</li>';
  }
  echo '</ul>';
}