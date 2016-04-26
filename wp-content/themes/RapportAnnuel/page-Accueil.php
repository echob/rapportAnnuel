<?php
/*
 Template Name: Accueil template
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

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all d-all cf" >
							<?php $original_query = clone $wp_query; ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> >

								<section class="article-header m-all d-all">
									<div class="_layer" id="masterLayer">

										<img src="<?php the_field('entete_img1'); ?>">
									</div>

									<div class="_layer" id="img1">
										<img src="<?php the_field('entete_img2'); ?>">
									</div>

									<div class="_layer" id="img2">
										<img src="<?php the_field('entete_img3'); ?>">
									</div>

									<div class="_layer">
										<div class="_layerTxt" id="txt1"><?php the_field('entete_ligne_titre_1'); ?></div>
										<div class="_layerTxt" id="txt2"><?php the_field('entete_ligne_titre_2'); ?></div>
										<div class="_layerTxt" id="txt3"><?php the_field('entete_ligne_titre_3'); ?></div>
									</div>
									
								</section>

								<section id="MotDuPresident" class="d-all m-all">
									<div id="videoPresident">
										<img class="img100" src="<?php the_field('image_presidents'); ?>">
										<div id="videoPlayer">
											<div class="closeVid">X</div>
											<iframe class="d-all m-all" height="100%" src="<?php the_field('url_video_presidents'); ?>?enablejsapi" frameborder="0" allowfullscreen></iframe>
										</div>
									</div>
									
									<div id="presidentTextes">
										<h2 class="wow fadeIn _titrePresident"><?php the_field('titre_presidents'); ?></h2>
										<hr />
										<p><?php the_field('description_presidents'); ?></p>
									</div>

								</section>
							
								<section id="fondationChu" class="d-all m-all">

								<?php

								///// Carrousel Fondation + CHU Variables//////////

									query_posts(array(
										'numberposts' => -1,
										'post_type' => 'el_carrousel'
									));

									while ( have_posts() ) : the_post(); 
									
										$tax_id = get_field('carrousel-page');

										if ( $tax_id == '22') {

											$fondationCarousel .= '<li class="">'. get_field('texte_carrousel') . '</li>';

										} else if ( $tax_id == '24' ){

											$chuCarousel .= '<li class="box-chu">' . get_field('texte_carrousel') . '</li>';
										}
									
									endwhile;
						
									echo '<div id="carousel1" class="flexslider m-all d1-d3 squareBox"><ul class="slides">' . $fondationCarousel . '</ul></div>';
									echo '<div id="carousel2" class="flexslider m-all d4-d6 squareBox"><ul class="slides">' . $chuCarousel . '</ul></div>';
								
								/// return to original query							 
								$wp_query = clone $original_query;
								the_post();
								?>
								</section>
								
								<section class="d-all m-all" id="merciavous">

									<h1><?php the_field("titre_merci"); ?></h1>
									<div class="wrap_merci">
										<h2><?php the_field("sous-titre_merci"); ?></h2>
										<hr />
										<p><?php the_field("texte_intro_merci"); ?></p>
										<button type="button"> Merci lien</button>
									</div>

								</section>

								<section class="d-all m-all" id="EtatsFinancierEtListeDesDonateurs">

								</section>


							</article>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
