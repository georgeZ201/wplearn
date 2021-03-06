<?php
/*
Template Name: News
*/
?>

<?php
define("THISPAGE", "news");

get_header(); 
$oid = $post->ID; 
?>
<div class="page-wrapper site-content single-news clear-nav">
	<div id='news-event' class="news-leftcol-wrapper">
		<h2 class="heading-leftcol">News Story</h2>
		<h1 class="news-title-single"><?php the_title(); ?></h1>
		<div class="hero-news-content row">
			<div><?php the_post_thumbnail('sixteen-nine-large'); ?></div>
                        <div class="hero-news-listing-text">
                               <p class="news-event-summary"><?php echo get_post_meta($oid, ('summary'), true); ?></p>
                                <?php the_field('article'); ?>
				<div class="social-buttons">
					<h3>Share this:</h3>
					<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
							<a class="addthis_button_preferred_1"></a>
							<a class="addthis_button_preferred_2"></a>
							<a class="addthis_button_preferred_3"></a>
							<a class="addthis_button_compact"></a>
							<a class="addthis_counter addthis_bubble_style"></a>
						</div>
					<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=glassworkslon"></script>
<!-- AddThis Button END -->
				</div>
                        </div>
                </div>

		<div class="more-news row">
			<h2 class="heading-leftcol">More News Stories</h2>
		</div>
<?php
// 5 Latest posts
$wp_query = new WP_Query( array ( 'post_type' => 'news', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'ASC'));
while ( $wp_query->have_posts() ) : $wp_query->the_post();
  if($post->ID==$oid) {
    continue;
   }
?>              <div class="content-listing">
<?php
        if ( has_post_thumbnail()) : ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php { the_post_thumbnail('thumbnail') ; } ?></a>
<?php
        endif;?>
                        <div class="news-listing-text">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo get_post_meta($post->ID, ('excerpt'), true); ?></p>
                                <a href="<?=get_permalink($post->ID);?>">Read full story &raquo;</a>
                        </div>
                </div>
<?php
endwhile;
?>
	</div> <!-- .news-leftcol -->
<div class="sidebar-wrapper">
<?php
  get_sidebar('upcoming-events');
  get_sidebar('past-events');
?>
</div>
</div> <!-- page-wrapper -->
<?php get_footer(); ?>
