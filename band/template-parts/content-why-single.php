<?php
$rows = get_field('main_why');
if ($rows) {
  foreach ($rows as $row) {
    echo '<div class="col-md-4">';
    $image = $row['why_image']['url'];
    $title = $row['why_title'];
    $description = $row['why_description'];
    echo '<div class="feature">';
    // echo '<figure class="cut-corner">' . $image . '</figure>';
    echo '<figure class="cut-corner"><img src="' . $image . '" alt="" /></figure>';
    echo '<h3 class="feature-title">' . $title . '</h3>';
    echo '<p>' . $description . '</p>';
    echo '</div>';
    echo '</div>';
  }
}