<?php
/*
 Template Name: Niveau 3 template
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content" class="niveau3">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all d-all cf" >
							<?php $original_query = clone $wp_query; ?>

							<div class="article-header">
								<img src="<?php the_field('icone_entete_niveau3') ?>"/>
						        <h2><?php the_field('titre_enete_niveau3') ?></h2>
						        <h5><?php the_field('sous-titre_entete_niveau3') ?></h5>
						       	<hr class="hr_pink" />
						       	<p><?php the_field('texte_intro_entete_niveau3') ?></p>
							</div>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> >
								
									<?php

									query_posts(array(
										'numberposts' => -1,
										'post_type' => 'niveau3'
									));

									while ( have_posts() ) : the_post();


									if ( get_field('page_link_niveau3')->post_name != $pagename ) continue;

									?>

									<section class="sectionNiveau3">
										<h2><?php the_title(); ?></h2>

										<?php the_field('texte_niveau3'); ?>

										<?php
										$html = get_field('images_caroussel_niveau3');
										$video = get_field('video_niveau3');

										if ( !empty($html) ) {
												$dom = new domDocument;
												$dom->loadHTML($html);
												$dom->preserveWhiteSpace = false;

												$allImages = $dom->getElementsByTagName('img');
												$carousel = "";

												foreach ($allImages as $img) {
													$carousel .= '<li><img class="img100" src="'. $img->getAttribute('src') . '"></li>';
												}
											
											echo '<div id="carouselNiveau3" class="flexslider"><ul class="slides">' . $carousel . '</ul></div>';
										}

										if ( !empty($video) )
											echo '<div class="video"><iframe width="100%" src="'.$video.'?enablejsapi" frameborder="0" allowfullscreen></iframe></div>';
										?>

									</section>

									<?php endwhile; ?>

							</article>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
