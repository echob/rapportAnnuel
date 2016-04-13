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

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title wow jello" data-wow-duration="1s"><?php the_title(); ?></h1>

									<p> <?php the_content(); ?> </p>


								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// Connect au custom post type;
										$args = array('post_type' => 'niveau3');
										$loop = new WP_Query( $args );
										
										// Loop dans tout les éléments du custom post type;
										while ( $loop->have_posts() ) : $loop->the_post();

									?>
										<?php //Organise et affiche le contenu ?>

										<h1><?php the_title();?></h1>

										<p>
											<div class="wow fadeIn _accroche" data-wow-duration="1s"><?php the_field( 'accroche' );?></div>
											<div class="_content"><?php the_content(); ?></div>
										</p>


									<?php endwhile; ?>

								</section>


							</article>

						</main>

						<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
