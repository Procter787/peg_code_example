<?php
/* Flexible Content - Column Blocks
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/column-blocka' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/
?>


<?php if (get_row_layout() == 'column_blocks') : ?>
  <?php
  $blocks           = get_sub_field('blocks');
  $buttonTitle      = get_sub_field("cta_text");
  $buttonLink       = get_sub_field("cta_link");
  $width            = get_sub_field('column_width');
  $header           = get_sub_field('header');
  $video            = get_sub_field('video');


  $widthText = "";
  if ($width == "6") {
    $widthText = "small-12 large-6";
  } elseif ($width == "4") {
    $widthText = "small-12 large-4";
  } else {
    $widthText = "small-12";
  }
  ?>
  <div class="front-wrapper column-blocks">
    <div class="speciality-cards">
      <div class="grid-container">
        <div class="grid-x grid-padding-x narrow-grid-padding-x-large-up animation-element fade-in ripple"> <?php $index = 1 ?>
          <div class="cell small-12 column-blocks-header">
            <?php if ($header) : ?><h2><?php echo $header; ?></h2><?php endif; ?>
          </div>
          <?php foreach ($blocks as $block) :
            $image            = $block['image'] ?? null;
            $logo             = $block['logo'] ?? null;
            $title            = $block['title'] ?? null;
            $header           = $block['header'] ?? null;
            $paragraph        = $block['paragraph'] ?? null;
            $blockLink        = $block['block_link'] ?? null;
            $videoPopup       = $block['video_popup'] ?? null;
            $videoLink        = $block['video_link'] ?? null;
          ?>
            <div class="<?php if ($videoPopup): echo 'has-video'; endif; ?> no-padding cell <?php echo $widthText; ?> ripple-element" style="transition-delay: 0s; opacity: 1;">
              <div class="speciality-card hover-animation-element " id="transition-order-1" data-ripple="1">
                <?php if ($image) : ?><img class="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Block Image'; ?>" /><?php endif; ?>
                <?php if ($title) : ?><p class="title hide-hover"><?php echo $title; ?></p><?php endif; ?>
                <div class="speciality-card-info ">
                  <?php if ($videoPopup) : ?>
                    <div id="loc-video-container " class="video-box mb-20" data-open="video-modal" data-video="<?php echo $videoLink; ?>" data-title="">
                      <img class="logo video-play-btn" src="<?php echo get_template_directory_uri() . '/src/assets/images/icons/icon_play-button.png'; ?>" alt="Play Button" />
                    </div>
                  <?php else : ?>
                    <?php if ($header) : ?><p class="title semi-strong"><?php echo $header; ?></p><span class="seperator animation-element line-slide-middle-out-hover in-view"> &nbsp;</span><?php endif; ?>
                    <?php if ($logo) : ?><div class="logo-box"><img class="logo text-center" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']) ?: 'Block Image'; ?>" /></div> <?php endif; ?>
                    <?php if ($paragraph) : ?><p class="description"><?php echo $paragraph; ?></p><?php endif; ?>
                    <?php if ($blockLink) : ?>
                      <div class="block-cta">
                        <a href="<?php echo $blockLink['url']; ?>"><button class="btn button btn-white-outline radius"><?php echo $blockLink['title']; ?></button></a>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
                <div class="gradient-overlay mobile-gradient animation-hover-gradient-effect"></div>
                <div class="gradient-overlay gradient-hover"></div>
              </div>
            </div>
            <?php $index++ ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php if ($buttonLink) : ?>
      <div class="cta">
        <a href="<?php echo $buttonLink; ?>"><button class="btn button btn-white-outline radius"><?php echo $buttonTitle; ?></button></a>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>