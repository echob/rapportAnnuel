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

			<div id="content">

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


								$myArgs = array(
									'numberposts' => -1,
									 'post_type' => 'liste_donateurs',
									  'orderby' => 'category_name',
									   'order' => 'ASC'
								);

								$myQuery = new WP_Query( $myArgs );

								//$arrCat=get_categories( array ('orderby' => 'name', 'order' => 'asc' ) );
								$arrDonateurs=array();
								$arrDonateursString=array();

								while ( $myQuery->have_posts() ) : $myQuery->the_post(); 

									$categorie 		= get_field('categorie_de_don_liste');
									$categorieName	= $categorie->name;
									$categorieID	= $categorie->slug;
									$htmlCtn		= '<div>'.get_field('liste_de_donateurs').'</div>';
									//$htmlCtn		= "";
									$position 		= get_field('position_don_liste');

									if ( get_field('image_don_liste') ) {
										$htmlCtn .=	'<div class="wrap_temoignage_don">';
										$htmlCtn .=		'<img class="img100 imgTemoignage" src="'.get_field('image_don_liste').' " />';
										$htmlCtn .=		'<div class="temoignage_don">';
										$htmlCtn .=			'<div class="ruban_bleu">';
										$htmlCtn .=				'<div class="fleche_right"><img src="'.get_template_directory_uri().'/library/images/bt_fleche_right.png"/></div>';
																				$htmlCtn .=				'<div>'.get_field('texte_intro_citation_don_liste').'</div>';

										$htmlCtn .=				'<div class="bout_ruban"><img src="'.get_template_directory_uri().'/library/images/ruban.png"/></div>';
										$htmlCtn .=			'</div>';
										$htmlCtn .=			'<div class="temoignageOver">'.get_field('texte_citation_don_liste').'</div>';
										$htmlCtn .=		'</div>';
										$htmlCtn .=	'</div>';
									}

									//Organise les contenus de liste
									if(is_numeric($categorieID)) {
										
										if ( isset( $arrDonateurs[$categorieID][$position] ) ) $position = $position+1;

										$arrDonateurs[$categorieID] = [
											'name' => $categorie->name
										];
										$arrDonateurs[$categorieID][$position] =$htmlCtn;

										ksort($arrDonateurs[$categorieID]);
									} else {

										if ( isset( $arrDonateursString[$categorieID][$position] ) ) $position = $position+1;

										$arrDonateursString[$categorieID] = [
											'name' => $categorie->name
										];
										$arrDonateursString[$categorieID][$position] =$htmlCtn;

										ksort($arrDonateursString[$categorieID]);
										
									}
									//sort($arrDonateurs);

								//print_r($categorie);
								endwhile;

								//print_r($arrDonateurs);

								ksort($arrDonateurs);

								array_merge($arrDonateurs, $arrDonateursString);

								foreach ($arrDonateurs as $key => $arrValue) {
									echo 	'<section class="listeDonateurs">'.
											'<h3>'.$arrValue[name].'</h3>';
									foreach ($arrValue as $key => $value) { 
										echo  $value;
									}
									echo 	'<hr class="hr_blue"/>  </section>';
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
