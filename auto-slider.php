<?php
/* Flexible Content - Auto Slider
* The template part for displaying flexible content
* <?php get_template_part( 'global-templates/auto-slider' ); ?>
**     Must be placed inside of:
***        <?php if( have_rows('flexible_content') ): while ( have_rows('flexible_content') ) : the_row();?>
***        <?php endwhile; endif;?>
*/
?>


<?php if (get_row_layout() == 'auto_slider') : ?>
    <div class="auto-slider grid-container fluid">
        <div class="auto-slider-home ">
            <?php
            $header                         = get_sub_field("header");
            $sub                            = get_sub_field("sub_header");
            $buttonTitle                    = get_sub_field("cta_title");
            $buttonLink                     = get_sub_field("cta_link");
            $slider_images                  = get_sub_field('slider_images');
            $full_width_sub_div_background  = get_sub_field("full_width_sub_div_background");
            ?>
            <?php if ($full_width_sub_div_background) : ?>
                <div class="<?php echo $full_width_sub_div_background; ?>">
                    <div class="container text-center grid-container full">
                        <div class="custom-border-box">
                            <div class="visable-background cell full triangle">
                                <div class="slide-images">
                                    <?php foreach ($slider_images as $image) : ?>
                                        <div class="details">
                                            <img class="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Block Image'; ?>" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if ($header) : ?><h3 class="animation-element slide-up"><?php echo $header; ?></h3><?php endif; ?>
                                <hr class="animation-element slide-up">
                                <?php if ($sub) : ?><p class="cell grid-container large-12 animation-element slide-up"><?php echo $sub; ?></p><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($buttonLink) : ?>
                    <div class="cta grid-container animation-element slide-up in-view">
                        <a href="<?php echo $buttonLink; ?>"><button class="btn button  btn-white-outline radius"><?php echo $buttonTitle; ?></button></a>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="transparent-background">
                    <div class="container text-center grid-container full">
                        <div class="custom-border-box">
                            <div class="transparent-background cell full ">
                                <div class="slide-images">
                                    <?php foreach ($slider_images as $image) : ?>
                                        <div class="details">
                                            <img class="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']) ?: 'Block Image'; ?>" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if ($header) : ?><h3 class="animation-element slide-up"><?php echo $header; ?></h3><?php endif; ?>
                                <hr class="animation-element slide-up">
                                <?php if ($sub) : ?><p class="cell grid-container large-12 animation-element slide-up"><?php echo $sub; ?></p><?php endif; ?>
                            </div>
                        </div>
                        <?php if ($buttonLink) : ?>
                        <div class="cta grid-container animation-element slide-up in-view">
                            <a href="<?php echo $buttonLink; ?>"><button class="btn button radius btn-white-outline"><?php echo $buttonTitle; ?></button></a>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
<?php endif; ?>