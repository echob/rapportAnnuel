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

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all d-all cf" >
							<?php $original_query = clone $wp_query; ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> >

								<section class="article-header m-all d-all">
									<div class="_layer" id="masterLayer">
										<img class="img100" src="<?php the_field('entete_img1'); ?>">
									</div>

									<div class="_layer" id="img1">
										<img class="img100" src="<?php the_field('entete_img2'); ?>">
									</div>

									<div class="_layer">
										<div class="_layerTxtLeft" id="txt1"><?php the_field('entete_ligne_titre_1'); ?></div>
										<div class="_layerTxtLeft" id="txt2"><?php the_field('entete_ligne_titre_2'); ?></div>
									</div>
									
								</section>


								<section id="grandBenevoles" class="d-all m-all">
									<div class="intro_merci  d-all m-all">
										<h2><?php the_field('titre_grand_benevole'); ?></h2>
										<hr class="hr_pink"/>
										<p><?php the_field('texte_grand_benevole'); ?></p>
									</div>

									<div class="d1-d2 m-all boxGrandBenevole">
							            <img class="showBoxOver img100" src="<?php the_field('image_benevole_1'); ?>" />
								        <div class="boxTextOver box_pink">
						                	<div class="closeBoxOver">X</div>
						                 	<p><?php the_field('texte_benevole_1'); ?></p>
						          		</div>

						          		<div class="box box_grand_don">
							            	<h3><?php the_field('nom_benevole_1'); ?></h3>
								            <hr class="hr_pink"/>
								        </div>
						            </div>
						            
						            <div class="d3-d4 m-all boxGrandBenevole">
							            <img class="showBoxOver img100" src="<?php the_field('image_benevole_2'); ?>"/>
							            <div class="boxTextOver box_pink">
						                	<div class="closeBoxOver">X</div>
						                 	<p><?php the_field('texte_benevole_2'); ?></p>
						          		</div>
						          		<div class="box box_grand_don">
							            	<h3><?php the_field('nom_benevole_2'); ?></h3>
							            	<hr class="hr_pink"/>
							            </div>
						            </div>
						            
						            
						            <div class="d5-d6 m-all boxGrandBenevole">
							            <img class="showBoxOver img100" src="<?php the_field('image_benevole_3'); ?>" />
							            <div class="boxTextOver box_pink">
						                	<div class="closeBoxOver">X</div>
						                 	<p><?php the_field('texte_benevole_3'); ?></p>
						          		</div>
							            <div class="box box_grand_don">
							            	<h3><?php the_field('nom_benevole_3'); ?></h3>
							            	<hr class="hr_pink"/>							            
							            </div> 
						            </div>

								</section>
							

								<section id="grandsPartenaires" class="d-all m-all">

									<div class="intro_merci  d-all m-all">
										<h2><?php the_field('titre_grands_partenaires'); ?></h2>
										<hr class="hr_pink"/>
										<p><?php the_field('texte_grands_partenaires'); ?></p>
									</div>

								<?php

								///// Carrousel Fondation + CHU Variables//////////

									query_posts(array(
										'numberposts' => -1,
										'post_type' => 'el_carrousel'
									));

									while ( have_posts() ) : the_post(); 
									
										$type = get_field('carrousel_type');
										/*
										chu : Accueil – CHU
										fondation : Accueil – Fondation
										leucan : Merci – Leucan
										soleil : Merci – Enfant Soleil
										*/

										if ( $type == 'leucan') {

											$carousel1 .= '<li>'. get_field('texte_carrousel') . '</li>';

										} else if ( $type== 'soleil' ){

											$carousel2 .= '<li>' . get_field('texte_carrousel') . '</li>';
										}
									
									endwhile;
						
									echo '<div id="carousel1" class="flexslider m-all d1-d3"><ul class="slides">' . $carousel1 . '</ul></div>';
									echo '<div id="carousel2" class="flexslider m-all d4-d6"><ul class="slides">' . $carousel2 . '</ul></div>';
								
									/// return to original query							 
									$wp_query = clone $original_query;
									the_post();
								?>
								</section>
								
								<section class="d1-d3 m-all box_rene squareBox" id="reneAngelil">

				                	<h3><?php the_field('titre_accroche_rene'); ?></h3>
				                	<hr class="hr_blue"/>
				                	<p><?php the_field('accroche_rene'); ?></p>
				                	<div class="showBoxOver">show</div>

					                <div class="box_blue boxTextOver">
					                	<div class="closeBoxOver">X</div>
					                 	<h3><?php the_field('titre_rene'); ?></h3>
					                 	<p><?php the_field('texte_rene'); ?></p>
					          		</div>

								</section>

								<section class="d4-d6 m-all squareBox">
					                <img src="<?php the_field('image_rene'); ?>" class="imgH100"/>
								</section>


								  <section class="d1-d2 m-all lien_niveau3">
								    <div class="box box_1">
								      <img  class="wow bounceIn" src="<?php the_field('icone_1_lien_niveau3'); ?>"/>
								      <h3><?php the_field('titre_1_lien_niveau3'); ?></h3>
								      <hr class="hr_blue"/> 
								      <a class="next" href="<?php the_field('lien_1_niveau3'); ?>"><img class="wow bounceInRight" src="<?php echo get_template_directory_uri(); ?>/library/images/next_blue.png"/></a>
								    </div>
								  </section>


								  <section class="d3-d4 m-all lien_niveau3">
								    <div class="box box_2">
								      <img  class="wow zoomIn" src="<?php the_field('icone_2_lien_niveau3'); ?>"/>
								      <h3><?php the_field('titre_2_lien_niveau3'); ?></h3>
								      <hr class="hr_pink"/>
								      <a class="next" href="<?php the_field('lien_2_niveau3'); ?>"><img class="wow bounceInRight" data-wow-delay="0.2s" src="<?php echo get_template_directory_uri(); ?>/library/images/next_pink.png"/></a>
								    </div>
								  </section>


								<section class="d5-d6 m-all lien_niveau3">
								  <div class="box box_3">
								    <img  class="wow zoomIn" src="<?php the_field('icone_3_lien_niveau3'); ?>"/>
								    <h3><?php the_field('titre_3_lien_niveau3'); ?></h3>
								    <hr class="hr_pink"/>
								    <a class="next" href="<?php the_field('lien_3_niveau3'); ?>"><img class="wow bounceInRight" data-wow-delay="0.4s" src="<?php echo get_template_directory_uri(); ?>/library/images/next_purple.png"/></a>
								  </div>
								</section>


								<!--  3 colonnes  deuxieme ligne  -->           
								  <section class="d1-d2 m-all lien_niveau3">
								    <div class="box box_4">
								      <img class="wow bounceIn" src="<?php the_field('icone_4_lien_niveau3'); ?>"/>
								      <h3><?php the_field('titre_4_lien_niveau3'); ?></h3>
								      <hr class="hr_blue"/>
								      <a class="next" href="<?php the_field('lien_4_niveau3'); ?>"><img class="wow bounceInRight"  src="<?php echo get_template_directory_uri(); ?>/library/images/next_blue.png"/></a>
								    </div>
								  </section>

								  <section class="d3-d4 m-all lien_niveau3">
								    <div class="box box_5">
								      <img  class="wow bounceIn" src="<?php the_field('icone_5_lien_niveau3'); ?>"/>
								      <h3><?php the_field('titre_5_lien_niveau3'); ?></h3>
								      <hr class="hr_green"/>
								      <a class="next" href="<?php the_field('lien_5_niveau3'); ?>"><img class="wow bounceInRight" data-wow-delay="0.2s" src="<?php echo get_template_directory_uri(); ?>/library/images/next_green.png"/></a>
								    </div>
								  </section>

								  <section class="d5-d6 m-all lien_niveau3">
								    <div class="box box_6">
								      <img  class="wow bounceIn" src="<?php the_field('icone_6_lien_niveau3'); ?>"/>
								      <h3><?php the_field('titre_6_lien_niveau3'); ?></h3>
								      <hr class="hr_blue"/>
								      <a class="next" href="<?php the_field('lien_6_niveau3'); ?>"><img class="wow bounceInRight" data-wow-delay="0.4s" src="<?php echo get_template_directory_uri(); ?>/library/images/next_pink.png"/></a>
								    </div>
								  </section>


							</article>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
