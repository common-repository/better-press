<?php
/**
 * The Template for displaying all single bpProject Post Types.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header();

have_posts() ; 

the_post(); ?><section class="project-view-content">

			<header class="archive-header clearfix">

				<h1 class="archive-title"><?php the_title(); ?></h1>



				<div class="archive-img"><?php the_post_thumbnail(); ?>

				</div>	

			<div class="project-desc">

				

				<?php the_content(); ?> 

				</div>

			

			</header><!-- .archive-header -->

			

			<ul id="projectNav" class="clearfix">

				<li class="projectSelectBox"><a id="SelectDescription" class="selected" href="#longDescription">Galerie</a></li>

				<li class="projectSelectBox"><a id="SelectBlog" href="#projectBlog">Blog</a></li>

				<li class="projectSelectBox"><a id="SelectDonate" href="#projectDonate">Mach mit</a></li>

				</ul>

			<div id="projectContent">

				

				<article id="longDescription">

					<p>
hgfhfhghgghhfghhfhfhffhfg
	

			

						<?php
						$pid = get_post_meta(get_the_ID(), 'am_bp_int_id', true);
					
						$mypages = get_pages( array( 'meta_key' => 'am_bp_int_id', 'meta_value' => $pid ) );
						
						foreach( $mypages as $page ) {		

							$content = $page->post_content;

							if ( ! $content ) // Check for empty page

								continue;

					

							$content = apply_filters( 'the_content', $content ); 

						?>

		

						<div><?php echo $content; ?></div>

						<?php } ?>	

					</p>

				</article>

				<div id="projectBlog">

				

			<?php

			$cat_id = get_post_meta(get_the_ID(), 'am_bp_attach_blog', true);
			
		

			$args = array(

	'posts_per_page'  => 5,

	'numberposts'     => 5,

	'offset'          => 0,

	'category'        => $cat_id,

	'orderby'         => 'post_date',

	'order'           => 'DESC',

	'include'         => '',

	'exclude'         => '',

	'meta_key'        => '',

	'meta_value'      => '',

	'post_type'       => 'post',

	'post_mime_type'  => '',

	'post_parent'     => '',

	'post_status'     => 'publish',

	'suppress_filters' => true ); 

			$ProjectBlogPosts = get_posts( $args );

			

			foreach ($ProjectBlogPosts as $BlogPost) {

				setup_postdata( $BlogPost )
				?>

				<article id="post-<?php echo $BlogPost->ID ?>" <?php post_class(); ?>>

				<header class="entry-header">

				<h2 class="entry-title"><?php echo $BlogPost->post_title; ?></h2>

				</header><!-- .entry-header -->

				<div class="postThumbnail"> 

				<?php

				if (get_the_post_thumbnail( $BlogPost->ID)) {

					echo get_the_post_thumbnail( $BlogPost->ID);

				} else {

					echo wp_get_attachment_image(302, 'full');



				}

 ?></div>

				<div class="entry-content"><?php echo the_excerpt(); ?>

					<div class="entry-link"><a href="<?php echo $BlogPost->guid  ?>" title="Link zu <?php echo $BlogPost->post_title ?>" rel="bookmark">Mehr</a>

					</div>

				</div><!-- .entry-content -->

				<footer class="entry-meta">

					<?php twentytwelve_entry_meta(); ?>

					</footer><!-- .entry-meta -->

	</article>

					<?php
			}

			

			?></div>

			<article id="projectDonate">

				<a class="pageAnchor" name="projectDonate">

					<h3>Hilf bei dem Projekt mit</h3></a>

				<script type="text/javascript">

  /* Configure at https://www.betterplace.org/de/projects/9777-morchenpark-gemeinsam-das-spreeufer-retten/iframe_donation_form */

  var _bp_iframe         = _bp_iframe || {};

  _bp_iframe.project_id  = 9777; /* REQUIRED */

  _bp_iframe.lang        = 'de'; /* Language of the form */

  /* Uncomment for further customization but *only* if you really need to! */

  //_bp_iframe.width  = 600;  /* Custom iframe-tag-width, integer, minimum 450px */

  _bp_iframe.height = 610;  /* Custom iframe-tag-height, integer */

  _bp_iframe.color  = '555'; /* Button and banderole color, hex without "#" */

  //_bp_iframe.background_color = 'fff'; /* Background-color, hex without "#" */

  _bp_iframe.default_amount   = 10;    /* Donation-amount, integer 1-99 */

  (function() {

    var bp = document.createElement('script'); bp.type = 'text/javascript'; bp.async = true;

    bp.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.betterplace.org/assets/load_donation_iframe.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(bp, s);

  })();

</script>

<div id="betterplace_donation_iframe" style="background: transparent url('http://www.betterplace.org/assets/new_spinner.gif') 275px 20px no-repeat;"><strong><a href="https://www.betterplace.org/de/projects/9777-morchenpark-gemeinsam-das-spreeufer-retten/donations/new">Jetzt Spenden für &bdquo;Mörchenpark: Gemeinsam das Spreeufer retten!&ldquo; bei unserem Partner betterplace.org</a></strong></div>

</article></div><?php	

if (function_exists('dynamic_sidebar')) {

				echo "<div id='projectSidebar'>";

				dynamic_sidebar('projectsidebar');

				echo "</div>";

			}

			twentytwelve_content_nav('nav-below');

			?>



		

		</div><!-- #content -->

	</section><!-- #primary -->

	

	

	

<div class="projbottom">

<?php

$pagelist = get_pages('child_of=10&sort_column=menu_order&sort_order=asc&exclude=585');

$pages = array();

foreach ($pagelist as $page) {

   $pages[] += $page->ID;

}



$current = array_search(get_the_ID(), $pages);

$prevID = $pages[$current-1];

$nextID = $pages[$current+1];

?>





<?php if (!empty($prevID)) { ?>

<div class="alignleft">

<a href="<?php echo get_permalink($prevID); ?>"

  title="<?php echo get_the_title($prevID); ?>">< <?php echo get_the_title($prevID); ?></a>

</div>

<?php }

if (!empty($nextID)) { ?>

<div class="alignright">

<a href="<?php echo get_permalink($nextID); ?>" 

 title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID); ?> ></a>

</div>

<?php } ?>







</div>

<? //php get_sidebar(); ?>

<?php get_footer(); ?>