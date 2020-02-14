<?php

/**
 * Senior Leadership Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'senior-leadership-block-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'senior-leadership-block';
$classNameAlt = '';
if( !empty($block['className']) ) {
	$classNameAlt= $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// Load values and passing defaults.

$team_name = get_field('team_name');
$team_list = get_field('team_list');
$background_color = get_field('background_color') ?: 'geometric-pattern-bg';
if ($background_color == "geometric-pattern-blue-bg")
{
	$title_bg_color = "blue-bg";
}
elseif ($background_color == "geometric-pattern-bg")
{
	$title_bg_color = "white-bg";
}

//$alignment = get_field( 'alignment' );
$block_id = $block['id'];


?>
<div id="<?php echo 'senior-leadership-' . esc_attr( $block_id ); ?>"class="<?php echo esc_attr($className); ?> <?php echo esc_attr($background_color); ?> section">
	<div class="title <?php echo $title_bg_color ?>">
		<h2><?php echo $team_name ?></h2>
	</div>
	<div class="senior-leadership-block-contents center">
		<div class="senior-leadership-block-container">
			<?php
			while ( have_rows('team_list') ) : the_row();
				$name = get_sub_field('name');
				$lightboxName = str_replace(' ', '', $name);
				$leader_photo = get_sub_field('photo');
				$company_name = get_sub_field( 'company');
				$bio = get_sub_field("bio");
				?>
				<div class="senior-leadership-block-item" data-featherlight="<?php echo "#" . $lightboxName ?>">

					<div class="senior-leadership-block-image-container">
						<img class="senior-leadership-block-image" src="<?php echo $leader_photo['url']; ?>" alt="<?php echo $leader_photo['alt']; ?>"/>
					</div>
					<div class="senior-leadership-block-text-container">
						<div class="senior-leadership-block-item-content">
							<h3><?php the_sub_field('name');?></h3>
							<?php
							if (the_sub_field('company') != "")
							{
								?>
								<p><?php the_sub_field('job_title'); ?>&emdash; <?php echo $company_name ?></p>
								<?php
							}
							else{
								?>
								<p><?php the_sub_field('job_title'); ?></p>
							<?php
							}

							?>
							<div class="bio" id="<?php echo $lightboxName?>">
								<div class="top">
									<div class="bio-block-container">
										<div class="bio-block-image-container">
											<img src="<?php echo $leader_photo['url']; ?>" alt="<?php echo $leader_photo['alt']; ?>"/>
										</div>
										<div class="bio-block-text-container">
											<h3><?php the_sub_field('name');?></h3>
											<?php
											if (the_sub_field('company') != "")
											{
												?>
												<p><?php the_sub_field('job_title'); ?>&emdash;<?php echo $company_name ?></p>
												<?php
											}
											else {
												?>
												<p><?php the_sub_field('job_title'); ?></p>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<div class="bottom">
									<?php echo $bio?>
								</div>

							</div>
						</div>
					</div>
				</div>
			<?php
			endwhile; ?>
		</div>
	</div>
</div>
