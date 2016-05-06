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
									<div class="_layer fond_filtre" id="masterLayer">
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
											<img src="<?php the_field('icone_citation') ?>">
											<?php the_field('entete_citation_1') ?>; 
											<?php
												if ( get_field('texte_intro_merci') == "" ){
													echo "<br />".get_field('signature_citation'); 
												} else {
													echo "<br /><a class='_lienCitation' href='".get_field('lien_signature_citation')."'>". get_field('signature_citation')."</a>";
												}
											?>
										</div>
									</div>
									
								</section>

								<section class="tem_text d1-d3 m-all">
					                <?php the_field('page_temoignage_txt_1'); ?>
					            </section>
					                
					            
					            <section class="d4-d6 m-hide">
					                <img src="<?php the_field('page_temoignage_img_1'); ?>" class="img100"/>
					            </section>
					    
					    
					            <section class="d1-d3 m-all">
					                <img src="<?php the_field('page_temoignage_img_2'); ?>" class="img100"/>
					            </section>
					    
					    
					            <section class="tem_text d4-d6 m-all">
					                <?php the_field('page_temoignage_txt_2'); ?>
					            </section>
					            
					            
					            <section class="box_un_pas d-all m-all" style="background:url(<?php the_field('imgtemoignage_pied_de_page_img'); ?>) no-repeat top center <?php the_field('temoignage_pied_de_page_coul'); ?>;">
									<h1><?php the_field('temoignage_pied_de_page_titre1'); ?></h1>
									<h2><?php the_field('temoignage_pied_de_page_titre2'); ?></h2>
					            	<?php the_field('temoignage_pied_de_page_texte'); ?>
					            </section>


							</article>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
