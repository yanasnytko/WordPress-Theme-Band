<?php
$rows = get_field('main_quotes');
if ($rows) {
  echo '<ul class="slides">';
  foreach ($rows as $row) {
    $text = $row['quote_text'];
    $author = $row['quote_author'];
    $author_role = $row['quote_author_role'];
    echo '<li>';
    echo '<blockquote>';
    echo '<p>' . $text . '</p>';
    echo '<cite>' . $author . '</cite>';
    echo '<span>' . $author_role . '</span>';
    echo '</blockquote>';
    echo '</li>';
  }
  echo '</ul>';
}