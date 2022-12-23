<?php
/* Flexible Content - Auto Slider
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/auto-slider' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/
?>


<?php if (get_row_layout() == 'stacked_slider') : ?>
    <div class="auto-slider stacked grid-container fluid">
        <div class="auto-slider-home ">
            <?php
            $top_section                    = get_sub_field("top_section");
            $bottom_section                 = get_sub_field("bottom_section");
            $header                         = $top_section["header"];
            $sub                            = $top_section["sub_header"];
            $buttonTitle                    = $top_section["cta_title"];
            $buttonLink                     = $top_section["cta_link"];
            $blocks                         = $bottom_section['testimonial_blocks'];
            $bottom_header                  = $bottom_section['header'];
            $slider_images                  = get_sub_field('slider_images');
            $background                     = get_sub_field("background_color");
            ?>
            <div class="background_three">
                <div class="container text-center grid-container full">
                    <div class="custom-border-box">
                        <div class="visable-background cell full triangle <?php echo $background; ?>">
                            <?php if ($header) : ?><h3 class="animation-element slide-up"><?php echo $header; ?></h3><?php endif; ?>
                            <hr class="animation-element slide-up">
                            <?php if ($sub) : ?><p class="cell grid-container large-12 animation-element slide-up"><?php echo $sub; ?></p><?php endif; ?>
                            <?php if ($buttonLink) : ?>
                                <div class="cta grid-container animation-element slide-up in-view">
                                    <a href="<?php echo $buttonLink; ?>"><button class="btn button  btn-white-outline radius"><?php echo $buttonTitle; ?></button></a>
                                </div>
                            <?php endif; ?>
                            <div class="slide-images">
                                <?php foreach ($slider_images as $image) : ?>
                                    <div class="details">
                                        <img class="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Block Image'; ?>" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="testimonial-columns">
                                <?php if ($bottom_header): ?><h2><?php echo $bottom_header; ?></h2><?php endif; ?>
                                <div class="grid-x grid-container animation-element fade-in ripple">
                                    <?php foreach( $blocks as $block ) : 
                                        $image = $block['image'] ?? null;
                                        $title = $block['title'] ?? null;
                                        $paragraph = $block['paragraph'] ?? null;
                                    ?>
                                    <div class="cell small-12 large-4 text-center ripple-element">
                                        <?php if ($image): ?><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Block Image'; ?>" /><?php endif; ?>
                                        <?php if ($title): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
                                        <?php if ($paragraph): ?><p><?php echo $paragraph; ?></p><?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
<?php endif; ?>