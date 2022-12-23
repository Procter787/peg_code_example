<?php
/* Flexible Content - Auto Slider
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/auto-slider' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/
?>




<?php if (get_row_layout() == 'recent_news') : ?>
  <div class="grid-container recent-news">
    <?php
    $title = get_sub_field("title");
    ?>
    <div class="content text-center">
      <?php if ($title) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
    </div>
    <div class="articles">
      <?php
      $args = array(
        'post_type' => 'peg_news_articles',
        'posts_per_page' => -1, 
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'ignore_custom_sort' => true,
        'suppress_filters' => true
      );
      $query = new WP_Query($args);
      while ($query->have_posts()) : $query->the_post(); ?>

        <div class="article">
          <div class="featured-image">
            <?php $image = get_field('article_image', get_the_id()); ?>
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
          </div>
          <h4 class="large"><?php the_title(); ?></h4>
          <div class="description ">
            <?php $category = get_the_terms(get_the_id(), 'peg_news_articles_category'); ?>
            <?php if ($category): ?><p><?php echo $category[0]->name; ?></p><?php endif; ?>
            <p class="date"><?php the_date('M j, Y'); ?></p>
          </div>
          <div class="cta grid-container">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><button class="btn-secondary">READ MORE ></button></a>
          </div>
        </div>
      <?php
      // Repeat the process and reset once it hits the limit
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </div>
<?php endif; ?>