<?php
get_header();
?>
<main id="mainContainer" class="container page-body py-5">
  <div class="row">
    <?php
    if (is_singular()) {
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          get_template_part('partials/content', 'single');
          wp_link_pages();
        } // end while

    ?>
        <div class="col-sm-12">
          <div class="prev-posts pull-left">
            <?php
            $prev_post = get_previous_post();
            if ($prev_post) {
              $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
              echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title . '" class=" "><strong> <<< &quot;' . $prev_title . '&quot;</strong></a>' . "\n";
            }
            ?>
          </div>
          <div class="next-posts pull-right">
            <?php
            $next_post = get_next_post();
            if ($next_post) {
              $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
              echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title . '" class=" "><strong>&quot;' . $next_title . '&quot; >>> </strong></a>' . "\n";
            }
            ?>
          </div>
        </div>
      <?php
      } // end if
    } else {
      ?>
      <div class="col-sm-12 content">
        <?php
        if (have_posts()) {
          while (have_posts()) {
            add_thickbox();
            the_post();
        ?>
            <article <?php post_class('post-card'); ?>>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
                } else {
                ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail.jpg" alt="<?php bloginfo('name'); ?>">
                <?php
                }
                ?>
                <div class="container py-5">
                  <span class="date d-inline-block">
                    <?php
                    $postDate = get_the_date('M jS');
                    echo '<time datetime="' . get_the_date('Y-m-d') . '" class="text-white">' . $postDate . '</time>';
                    ?>
                  </span>
                  <h2 class="text-white">
                    <?php
                    the_title(); ?>
                  </h2>
                  <div class="details border-0">
                    <span class="author d-block d-md-inline-block p-1">
                      <?php
                      _e('by ', 'mytheme');
                      echo '<strong class="text-white">' . get_the_author_meta('user_firstname') . '</strong>';
                      ?>
                    </span>
                    <?php
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
                      <span class="d-block d-md-inline-block p-1 text-white">
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
              </a>
            </article>
        <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
      <div class="col-sm-12 content">
        <?php
        /* The 2nd Query (without global var) */
        $args2 = array(
          'post_type'  => 'movie',
        );

        $query2 = new WP_Query($args2);

        if ($query2->have_posts()) {
          // The 2nd Loop
          while ($query2->have_posts()) {
            $query2->the_post();
        ?>
            <article <?php post_class('post-card'); ?>> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('large');
                } else {
                ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post-thumbnail.jpg" alt="<?php bloginfo('name'); ?>">
                <?php
                }
                ?>
                <div class="container py-5">
                  <span class="date d-inline-block">
                    <?php
                    $movie_year = get_post_meta(get_the_ID(), 'year', true);
                    // Check if the custom field has a value.
                    if (!empty($movie_year)) {
                      _e('Year', 'mytheme');
                      echo ': <time datetime="' . get_the_date($movie_year) . '" class="text-white font-weight-bold">' . $movie_year . '</time>';
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
                      echo '<span class="text-white">' . esc_html($on_genre) . '</span>';
                    endif;
                    ?>
                  </span>
                  <h2 class="text-white">
                    <?php
                    the_title(); ?>
                  </h2>
                  <div class="details border-0">
                    <span class="author d-block d-md-inline-block p-1">
                      <?php
                      _e('by ', 'mytheme');
                      $movie_director = get_post_meta(get_the_ID(), 'director', true);
                      // Check if the custom field has a value.
                      if (!empty($movie_director)) {
                        echo '<span class="text-white font-weight-bold">' . $movie_director . '</span>';
                      }
                      ?>
                    </span>
                    <?php
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
                      <span class="d-block d-md-inline-block p-1 text-white">
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
              </a>
            </article>
        <?php
          }

          // Restore original Post Data
          wp_reset_postdata();
        } else {
          echo "<h3>Sorry! no match criteria.</h3>";
        }
        ?>
      </div>
      <div class="col-sm-12">
        <?php the_posts_pagination(); ?>
      </div>
    <?php
    }
    ?>

  </div>
</main>
<?php
get_footer();
