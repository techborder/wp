<?php
/*
Template Name: Login Page
*/
get_header(); 
wedding_update_page_layout_meta_settings(); ?>
 
<div id="content" class="page">
     <div class="container">
		<?php if ( is_active_sidebar( 'primary-widget-area' ) ) { ?>
		<div id="sidebar1"  class="widget-area" role="complementary">
			<div class="sidebar-container login">
				<?php dynamic_sidebar( 'primary-widget-area' );  ?>
			</div>
		</div>
		<?php } ?>
		<div id="blog" class="blog">
				<?php if ( ! is_user_logged_in() ) { ?>
						<form name="loginform" id="loginform" action="<?php echo home_url(); ?>/wp-login.php" method="post">
								<div id="log_in">
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
											<?php endwhile; ?>
										<?php endif; ?>
										
										<div>
											<input type="text" placeholder="<?php echo __('Log in','wd_wedding'); ?>" name="log" id="user_login" class="input" value="" size="20" tabindex="10"/>
										</div>
								
										<div>									
											<input type="password" placeholder="<?php echo __('Password','wd_wedding'); ?>" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" />
										</div>								
								
										<div>	
											<input type="submit" name="wp-submit"  class="read_more" value="<?php echo __('Log in','wd_wedding'); ?>" style="width: 75px;float: right;cursor:pointer" tabindex="100" />
										</div>
									
										<div>
											<input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>/wp-admin/" />
										
											<input type="hidden" name="testcookie" value="1" />
										</div>
								</div>
						</form> 
				<?php
				}				
				if ( is_user_logged_in() ) { ?>

				<h3 class="page_title">	
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>  
				<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout" class="read_more log-out">						   
					<?php echo __('Log Out','wd_wedding'); ?>
				</a>
				<?php 
				} ?>		
</div>
<?php 
  if ( is_active_sidebar( 'secondary-widget-area' ) ) { ?>
	<div id="sidebar2"  class="widget-area" role="complementary">
		<div class="sidebar-container login">
			<?php dynamic_sidebar( 'secondary-widget-area' );  ?>
		</div>
	</div>     
<?php } ?>
	</div>
		<div class="clear"></div>
		<?php
 
 if ( is_active_sidebar( 'footer-widget-area1' ) ) { ?>
				<div id="sidebar3"  class="widget-area">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'footer-widget-area1' ); 	?>
					</div>
				</div>
          <?php } ?>   

			<?php if ( is_active_sidebar( 'footer-widget-area2' ) ) { ?>
				<div id="sidebar4"  class="widget-area">
					<div class="sidebar-container">
						<?php  dynamic_sidebar( 'footer-widget-area2' ); 	?>
					</div>
				</div>
          <?php } 

?>
</div>	

<?php get_footer(); ?>
