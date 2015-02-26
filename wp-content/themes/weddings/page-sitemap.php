<?php 
/* 
Template Name: Sitemap Page
*/ 

get_header(); 
wedding_update_page_layout_meta_settings();
?>
				
<div id="content" class="page">
	<div class="container">
		<?php 
		 if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
			<div id="sidebar1" class="widget-area" role="complementary">          
				<div class="sidebar-container">
				  <?php dynamic_sidebar( 'primary-widget-area' ); ?>
				</div>
			</div>
		<?php }?>
			
		<div id="blog" class="blog">
			<?php /*print page content*/ 
				if( have_posts() ) : 
					while( have_posts() ) : the_post(); ?>
						<div class="single-post">
							<h3 class="page_title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                                    
							<div class="entry">
								<?php the_content(); ?>
							</div>	
						</div>
							<?php endwhile; 
						 endif; ?>
					
						<div class="entry-content">
							<?php
                        global $post;
                        $web_business_meta = get_post_meta($post->ID,'_web_business_meta',TRUE); 
                        if (isset($web_business_meta['static_pages_on']) && $web_business_meta['static_pages_on']=="on" )
						{ ?>										
                            <div class="half-block sitemap">
								<h3>
									<?php if(isset($web_business_meta['static_pages_name'])) echo $web_business_meta['static_pages_name']; else echo __('Static Pages:', 'wd_wedding'); ?>
                                </h3>
                                <ul>
                                    <?php wp_list_pages("title_li="); ?>
                                </ul>
							</div>
							
								<?php } 
                                    if( isset($web_business_meta['all_categories_on']) && $web_business_meta['all_categories_on']=="on"){ ?>
                                    
							<div class="half-block sitemap">
								<h3>
									<?php if( isset($web_business_meta['all_categories_name'])) echo $web_business_meta['all_categories_name']; else echo __('All Categories:', 'wd_wedding'); ?>
                                </h3>
                                        
                                <ul>
                                    <?php wp_list_categories ('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?>
                                </ul>
							</div>
                                        
							<?php }
                                if( isset($web_business_meta['tags_on']) && $web_business_meta['tags_on']=="on"){ ?>
                                    
                            <div class="half-block sitemap">
								<h3>
                                    <?php if(isset($web_business_meta['tags_name'])) echo $web_business_meta['tags_name']; else echo __('Tags:', 'wd_wedding'); ?>
                                </h3>
                                        
                                <ul>
                                    <?php $tags = get_tags();
                                        if ( $tags ) {
                                            foreach ( $tags as $tag ) {
                                                echo '<li><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></li> ';
                                                    }
                                                } ?>
                                </ul>
							</div>
							
							<?php }
						if( isset($web_business_meta['archives_on']) && $web_business_meta['archives_on']=="on"){ ?>
							<div class="half-block sitemap">
								<h3>
									<?php if(isset($web_business_meta['archives_name'])) echo $web_business_meta['archives_name']; else echo __('Archives:', 'wd_wedding'); ?>
                                </h3>
                                        
                                <ul>
                                    <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
                                </ul>
							</div>
							
							<?php }
						if( isset($web_business_meta['authors_on']) && $web_business_meta['authors_on']=="on"){ ?>
                                
							<div class="half-block sitemap">
								<h3>
									<?php if(isset($web_business_meta['authors_name'])) echo $web_business_meta['authors_name']; else echo __('Authors:', 'wd_wedding'); ?>
                                </h3>
                                        
                                <ul>
                                    <?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?>
                                </ul>
							</div>
							
							<?php }
								
						if( isset($web_business_meta['blog_posts_on']) && $web_business_meta['blog_posts_on']=="on"){ ?>
							<div class="half-block sitemap">
								<h3>
									<span id="IL_AD7" class="IL_AD"><?php if(isset($web_business_meta['blog_posts_name'])) echo $web_business_meta['blog_posts_name']; else echo __('Blog Posts:', 'wd_wedding'); ?></span>:
                                </h3>
                                        
                                <ul>
                                    <?php $archive_query = new WP_Query('showposts=1000&#038;cat=-8');
										while ( $archive_query->have_posts() ) : $archive_query->the_post(); ?>
                                            <li>
                                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a> 
                                                            (<?php comments_number('0', '1', '%'); ?>)
                                            </li>
                                           <?php endwhile; ?>
                                </ul>
							</div>
								<?php }?>
						</div>
						
					<script>
						jQuery(document).ready(function(){
							var strheight=0;
							var i=0
							jQuery(".half-block").each(function(){
								if(i==0){var strheight=jQuery(this).height();i++;}
								if(jQuery(this).height()>strheight){strheight=jQuery(this).height();}
							});
						});
					</script>

          <?php 

	global $post;
	$withcomments = true;
	wp_reset_query();
	if(comments_open())
	{	 ?>
		<div class="comments-template">
			<?php echo comments_template(); ?>
		</div>
<?php
	}
?>
	</div>
				
<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
        <div id="sidebar2" class="widget-area" role="complementary">         
             <div class="sidebar-container">
                 <?php dynamic_sidebar( 'secondary-widget-area' );  ?>
             </div>
        </div>
	<?php } ?>
	   <div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>