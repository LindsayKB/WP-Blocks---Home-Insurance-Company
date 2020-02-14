<?php

/**
 * Columns With Icons and Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'columns-with-icons-and-text-block' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'columns-with-icons-and-text-block';
$classNameAlt = '';
if( !empty($block['className']) ) {
    $classNameAlt= $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and passing defaults.
$heading = get_field('heading') ?: 'heading';
$icon_banner = get_field('icon_banner');
$subheader = get_field('subheader') ?: 'subheader';
$background_color = get_field('background_color') ?: 'white-bg';

$columns = get_field('columns') ?: 'list of columns';


$block_id = $block['id'];


?>
<div id="<?php echo 'columns-with-icons-and-text-block-' . esc_attr( $block_id ); ?>"class="<?php echo esc_attr($className); ?> <?php echo esc_attr($background_color); ?> section">



    <div class="columns-with-icons-and-text-block-contents center">
        <div class="columns-with-icons-and-text-block-top-text">
            <?php if ($icon_banner){
                $banner_url=$icon_banner['url'];
              echo '<div class="icon-banner-container">';?>
                <div class="icon-banner-image-container">
                 <img class="icon-banner" src="<?php echo $banner_url;?>"/>
                </div>
                <?php
                echo '<h3> '.$heading.'</h3>';
              echo '</div>';
             }else{
                if ($heading != 'heading'){
                    echo '<h2>'.$heading.' </h2>';
               }
                if ($subheader != 'subheader') {
                    echo '<h3>' . $subheader . '</h3>';
                }
        }; ?>
        </div>
		<div class="columns-with-icons-and-text-block-column-container">
			<!-- Start repeater field -->
			<?php
			while ( have_rows('columns') ) : the_row();
			?>
			<?php /*Configure image details*/ $image = get_sub_field('icon-image'); ?>
				<div class="content <?php echo esc_attr($classNameAlt); ?>">
					<span class="column-divider"></span>
					<!-- Mobile -->
					<div class="mobile-block">
						<div class="column-heading">
                            <?php if ($image){
							echo'<div class="column-icon-container">'; ?>
                             <img class="column-icon" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						    <?php echo'</div>';
                            }else {
                            echo'<div class="column-icon-spacer"></div>';
                        }; ?>

								<div class="columns-with-icons-and-text-block-column-title"><p><?php the_sub_field('title'); ?></p></div>
						</div>
						<div class="text-bottom">
							<div class="columns-with-icons-and-text-block-text">
								<p><?php the_sub_field('description'); ?></p>
							</div>
						</div>
					</div>
					<!-- Desktop -->
					<div class="desktop-block">
                        <?php if ($image): ?>
							<div class="column-icon-container">
								<img class="column-icon" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>
                        <?php endif; ?>
						<div class="columns-with-icons-and-text-block-text">
							<p class="columns-with-icons-and-text-block-column-title"><?php the_sub_field('title'); ?></p>
							<p><?php the_sub_field('description'); ?></p>
						</div>
					</div>

				</div>
			<?php
			endwhile; ?>
			<!-- End repeater field -->


		</div>
    </div>
</div>
<!--</div>-->


