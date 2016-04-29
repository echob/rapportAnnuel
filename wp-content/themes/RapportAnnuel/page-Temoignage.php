<?php
/*
 Template Name: Témoignages template
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

							<?php
							// init post elements
							the_post(); 

							// Stock content for later use
							$titreMerci = get_field("titre_merci");
							$sousTitreMerci = get_field("sous-titre_merci");
							$texteIntroMerci = get_field("texte_intro_merci");

							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> >

								<section class="article-header m-all d-all">
									<div class="_layer" id="masterLayer">

										<img class="img100" src="<?php the_field('entete_img1'); ?>">
									</div>

									<div class="_layer" id="img1">
										<img class="img100" src="<?php the_field('entete_img2'); ?>">
									</div>

									<div class="_layer" id="img2">
										<img class="img100" src="<?php the_field('entete_img3'); ?>">
									</div>

									<div class="_layer">
										<div class="_layerTxt" id="txt1"><?php the_field('entete_ligne_titre_1'); ?></div>
										<div class="_layerTxt" id="txt2"><?php the_field('entete_ligne_titre_2'); ?></div>
										<div class="_layerTxt" id="txt3"><?php the_field('entete_ligne_titre_3'); ?></div>
									</div>

									<div class="_layer">
										<div class="_layerCitation" id="citation">
											<?php
												echo "<span class='_quote'>".get_field('entete_citation_1')."</span>"; 

												if ( get_field('texte_intro_merci') == "" ){
													echo "<br />".get_field('signature_citation'); 
												} else {
													echo "<br /><a class='_lienCitation' href='".get_field('lien_signature_citation')."'>". get_field('signature_citation')."</a>";
												}
											?>
										</div>
									</div>
									
								</section>

								<section class=" " id="MotDuPresident">
									
								<p>
									<div class="wow fadeIn _excerpt"><?php the_excerpt(); ?></div>
								</p>

								</section>

								

								<?php
								///// Carrousel Fondation + CHU //////////

									/*$posts = get_posts(array(
										'numberposts' => -1,
										'post_type' => 'event',
										'meta_key' => 'location',
										'meta_value' => 'melbourne'
									));*/

									$posts = get_posts(array(
										'numberposts' => -1,
										'post_type' => 'el_carrousel'
									));

									if($posts)
									{

										$fondationCarrousel = "";
										$chuCarrousel = "";

										foreach($posts as $post)
										{
											$tax_id = get_field('carrousel-page');

											if ( $tax_id == '20') {

												$fondationCarrousel .= '<li> ' . get_the_title() . '</li>';

											} else if ( $tax_id == '24' ){

												$chuCarrousel .= '<li> ' . get_the_title() . '</li>';
											}
										}

										echo '<section class="carrousel" id="LaFondation"> <ul>' . $fondationCarrousel . '</ul> </section>';
										echo '<section class="carrousel" id="LeCHU"> <ul>' . $chuCarrousel . '</ul> </section>';
									}

								?>

								<section id="MerciAVous">

									<h1><?php echo $titreMerci; ?></h1>
									<h2><?php echo $sousTitreMerci; ?></h2>
									<hr />
									<p><?php echo $texteIntroMerci; ?></p>
									<button type="button"> Merci lien</button>

								</section>

								<section id="EtatsFinancierEtListeDesDonateurs">

								</section>


							</article>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
