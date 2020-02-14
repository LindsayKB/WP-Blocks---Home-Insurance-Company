<?php


/**
 * Full Width Cirtangle Hero Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-width-cirtangle-hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'full-width-cirtangle-hero';
$classNameAlt = '';
if (!empty($block['className'])) {
    $classNameAlt = $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and passing defaults.
$cirtangle_background_color = get_field("cirtangle_background_color");
$background_image = get_field("background_image");
$page_title_icon = get_field("page_title_icon");
$page_title = get_field("page_title")?:'';
$page_subtitle = get_field("page_subtitle")?:'';

$intro_card_type = get_field('intro_card_type')?: 'basic-card';

$intro_card_text = get_field('intro_card_text')?: 'basic card text';

$accordion_card_title = get_field('accordion_card_title') ?: 'accordion card title';
$accordion_card_content = get_field('accordion_card_content') ?: 'accordion card content';

$block_id = $block['id'];

?>
<div id="<?php echo 'full-width-cirtangle-hero-' . esc_attr( $block_id ); ?>"class="<?php echo esc_attr($className); ?>">
  <div class="full-width-cirtangle-hero-container ">
      <div class="full-width-cirtangle-hero-circle-spacing">
          <?php if ($page_title_icon): ?>
              <div class="full-width-cirtangle-hero-page-icon">
                  <img src="<?php echo $page_title_icon['url'];?>"/>
              </div>
          <?php endif; ?>
          <div class="full-width-cirtangle-hero-page-title">
              <?php if ($page_title != ''): ?>
                  <h1><?php echo $page_title;?></h1>
              <?php endif; ?>
              <?php if ($page_subtitle != ''): ?>
                  <h3><?php echo $page_subtitle;?></h3>
              <?php endif; ?>
          </div>
      </div>
      <div class="full-width-cirtangle-hero-circle">
          <?php if ($page_title_icon): ?>
    <div class="full-width-cirtangle-hero-page-icon">
         <img src="<?php echo $page_title_icon['url'];?>"/>
    </div>
          <?php endif; ?>
       <div class="full-width-cirtangle-hero-page-title">
           <?php if ($page_title != ''): ?>
        <h1><?php echo $page_title;?></h1>
           <?php endif; ?>
           <?php if ($page_subtitle != ''): ?>
           <h3><?php echo $page_subtitle;?></h3>
           <?php endif; ?>
       </div>
    </div>

</div>
    <div class="card-overlay-wide-certangle-hero">
    <?php if ($intro_card_type == 'basic-card'): ?>
        <div class="intro-card-container">
            <div class="intro-card-item">
                   <?php echo $intro_card_text;?>
            </div>
        </div>
        <?php else: ?>
    <div class="accordion-card-contents">
        <div class="accordion-card-item">
            <div class="accordion-card-item-question">
                <div class="accordion-card-item-title">
                    <h3><?php echo $accordion_card_title; ?></h3>
                </div>
                <div class="full-width-cirtangle-hero-accordion-card-display-answer-button">
                    <div class="accordion-card-open-arrow-icon">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/arrow-down-clean.svg"/>
                    </div>
                    <div class="accordion-card-close-arrow-icon">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/arrow-up-clean.svg"/>
                    </div>
                </div>
            </div>
            <div class="accordion-card-answer-container">
                <div class="accordion-answer-divider"></div>
                <h5 class="accordion-card-answer-content"><?php echo $accordion_card_content;?></h5>
            </div>
          </div>
        </div>
    <?php endif; ?>
       </div>
    </div>


<style>
    .full-width-cirtangle-hero-circle{
        background-color:<?php echo $cirtangle_background_color;?>;
        background-image:url("<?php echo $background_image['url'];?>") ;
        background-position: bottom center;
        background-size: cover;
        background-repeat: no-repeat;
    }

</style>
