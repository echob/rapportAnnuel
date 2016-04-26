<?php
/*
 Template Name: Merci à vous template
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

			<div id="content" class="merciPage">

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

									<div class="_layer">
										<div class="_layerTxtLeft" id="txt1"><?php the_field('entete_ligne_titre_1'); ?></div>
										<div class="_layerTxtLeft" id="txt2"><?php the_field('entete_ligne_titre_2'); ?></div>
									</div>
									
								</section>


								<section id="grandBenevoles" class="d-all m-all">
									<div class="intro_merci  d-all m-all">
										<h2><?php the_field('titre_grand_benevole'); ?></h2>
										<img src="img/pink_spacer.gif"/><br />
										<p><?php the_field('texte_grand_benevole'); ?></p>
									</div>

									<div class="d1-d2 m-all">
							            <img src="<?php the_field('image_benevole_1'); ?>" class="img100"/>
							            <div class="box box_grand_don">
							            	<h3><?php the_field('nom_benevole_1'); ?></h3>
								            <img src="img/pink_spacer.gif"/>
								        </div>
						            </div>
						            
						            <div class="d3-d4 m-all">
							            <img src="<?php the_field('image_benevole_2'); ?>" class="img100"/>
							            <div class="box box_grand_don">
							            	<h3><?php the_field('nom_benevole_2'); ?></h3>
							            	<img src="img/pink_spacer.gif"/>
							            </div>
						            </div>
						            
						            
						            <div class="d5-d6 m-all">
							            <img src="<?php the_field('image_benevole_3'); ?>" class="img100"/>
							            <div class="box box_grand_don">
							            	<h3><?php the_field('nom_benevole_3'); ?></h3>							            
							            	<img src="img/pink_spacer.gif"/>
							            </div>
						            </div>

								</section>
							

								<section id="grandsPartenaires" class="d-all m-all">

									<div class="intro_merci  d-all m-all">
										<h2><?php the_field('titre_grands_partenaires'); ?></h2>
										<img src="img/pink_spacer.gif"/><br />
										<p><?php the_field('texte_grands_partenaires'); ?></p>
									</div>

								<?php

								///// Carrousel Fondation + CHU Variables//////////

									query_posts(array(
										'numberposts' => -1,
										'post_type' => 'el_carrousel'
									));

									while ( have_posts() ) : the_post(); 
									
										$tax_id = get_field('carrousel-page');

										if ( $tax_id == '52') {

											$carousel1 .= '<li class="">'. get_field('texte_carrousel') . '</li>';

										} else if ( $tax_id == '53' ){

											$carousel2 .= '<li class="box-chu">' . get_field('texte_carrousel') . '</li>';
										}
									
									endwhile;
						
									echo '<div id="carousel1" class="flexslider m-all d1-d3"><ul class="slides">' . $carousel1 . '</ul></div>';
									echo '<div id="carousel2" class="flexslider m-all d4-d6"><ul class="slides">' . $carousel2 . '</ul></div>';
								
									/// return to original query							 
									$wp_query = clone $original_query;
									the_post();
								?>
								</section>
								
								<section class="d1-d3 m-all" id="reneAngelil">

					                <div class="box box_rene">
					                	<h3><?php the_field('titre_accroche_rene'); ?></h3>
					                	<img src="img/blue_spacer.gif"/>
					                	<p><?php the_field('accroche_rene'); ?></p>
					                </div>

					                <div class="box_blue boxTextOver">
					                 	<h3><?php the_field('titre_rene'); ?></h3>
					                 	<p><?php the_field('texte_rene'); ?></p>
					          		</div>

								</section>

								<section class="d4-d6 m-all">
					                <img src="img/rene.jpg" class="img100"/>
								</section>


							</article>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
