<?php
/*
 Template Name: Liste des donateurs template
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

			<div id="content" class="listeDonateurs niveau3">

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

								///// Carrousel Fondation + CHU Variables//////////

								query_posts(array(
									'numberposts' => -1,
									'post_type' => 'liste_donateurs'
								));

								$arrDonateurs=array();

								while ( have_posts() ) : the_post(); 

									$categorieName = get_field('categorie_de_don_liste')->name;
									$htmlCtn = get_field('liste_de_donateurs');
									$position = get_field('position_don_liste');

									//Organise les contenus de liste
									if ( isset( $arrDonateurs[$categorieName][$position] ) )
										$arrDonateurs[$categorieName][$position + 1] = $htmlCtn;	
									else $arrDonateurs[$categorieName][$position] = $htmlCtn;

									ksort($arrDonateurs[$categorieName]);
								
								endwhile;

								foreach ($arrDonateurs as $key => $arrValue) {
									echo 	'<section id="listeDonateurs" class="">'.
											'<h2>'.$key.'</h2>';
									foreach ($arrValue as $key => $value) { 
										echo  $value;
									}
									echo 	'</section>';
								}

								/// return to original query							 
								$wp_query = clone $original_query;
								the_post();
								?>

							</article>

						</main>

				</div>

			</div>


<?php get_footer(); ?>
