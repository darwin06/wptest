<article <?php post_class('w-100 col-sm-12'); ?>>
  <?php
  if (has_post_thumbnail()) {
    the_post_thumbnail('large');
  } else {
  ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail.jpg" alt="<?php bloginfo('name'); ?>">
  <?php
  }
  ?>
  <div class="container py-3 pl-0">
    <?php
    if (is_singular('movie')) {
    ?>
      <span class="date d-inline-block">
        <?php
        $movie_year = get_post_meta(get_the_ID(), 'movie_year', true);
        // Check if the custom field has a value.
        if (!empty($movie_year)) {
          _e('Year', 'mytheme');
          echo ': <time datetime="' . get_the_date($movie_year) . '" class=" font-weight-bold">' . $movie_year . '</time>';
        }
        ?>
      </span>
      <span class="d-inline-block">
        <?php
        $terms = get_the_terms(get_the_ID(), 'genre');
        if ($terms && !is_wp_error($terms)) :
          $genre_links = array();
          foreach ($terms as $term) {
            $genre_links[] = $term->name;
          }
          $on_genre = join(", ", $genre_links);
          _e('Genre', 'mytheme');
          echo ': <strong class="">' . esc_html($on_genre) . '</strong>';
        endif;
        ?>
      </span>
    <?php
    }
    ?>
    <h2 class="">
      <?php
      the_title(); ?>
    </h2>
    <div class="border-0">
      <?php
      if (is_singular('movie')) {
        _e('by ', 'mytheme');
        $movie_director = get_post_meta(get_the_ID(), 'movie_director', true);
        // Check if the custom field has a value.
        if (!empty($movie_director)) {
          echo '<span class="font-weight-bold">' . $movie_director . '</span>';
        }
      }


      if (has_category()) {
      ?>
        <span class="d-block d-md-inline-block p-1">
          <?php
          _e('categories ', 'mytheme');
          echo '<strong class="text-bold">';
          the_category(' ', 'single', $post->Id);
          echo '</strong>';
          ?>
        </span>
      <?php
      }
      if (has_tag()) {
      ?>
        <span class="d-block d-md-inline-block p-1 ">
          <?php
          _e('tags ', 'mytheme');
          echo '<strong class="text-bold">';
          the_tags(' ', 'single', $post->Id);
          echo '</strong>';
          ?>
        </span>
      <?php
      }
      ?>
    </div>
  </div>
  <div class="description">
    <?php
    the_content();
    ?>
  </div>
</article>
