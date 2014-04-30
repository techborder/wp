<?php
/*
Template Name: Display Authors
*/

// Get all users order by amount of posts
$allUsers = get_users('orderby=post_count&#038;order=DESC');

$users = array();

// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
	if(!in_array( 'subscriber', $currentUser->roles ))
	{
		$users[] = $currentUser;
	}
}

?>

<?php get_header(); ?>
	<header class="entry-header">
		<h1 class="page-title"><?php the_title(); ?><span class="breadcrumbs"><?php if (function_exists('formation_breadcrumbs')) formation_breadcrumbs(); ?></span></h1>
	</header><!-- .entry-header -->
<div id="primary_home" class="content-area">
<div id="content" class="fullwidth" role="main">
		<?php
		foreach($users as $user)
		{
			?>
			<div class="authorlist">
				<div class="authorAvatar">
					<?php echo get_avatar( $user->user_email, '128' ); ?>
				</div>
				<div class="authorInfo">
					<h2 class="authorName"><?php echo $user->display_name; ?></h2>
					<p class="authorDescrption"><?php echo get_user_meta($user->ID, 'description', true); ?></p>
					<p class="authorLinks"><a href="<?php echo get_author_posts_url( $user->ID ); ?>">Author Posts</a>
					<?php ?><div class="socialIcons">
						<ul>
							<?php
								$website = $user->user_url;
								if($user->user_url != '')
								{
									printf('<li class="weblink"><a href="%s">%s</a></li>', $user->user_url, 'Website');
								}

								$twitter = get_user_meta($user->ID, 'twitter_profile', true);
								if($twitter != '')
								{
									printf('<li class="twitter"><a href="%s">%s</a></li>', $twitter, 'Twitter');
								}

								$facebook = get_user_meta($user->ID, 'facebook_profile', true);
								if($facebook != '')
								{
									printf('<li class="facebook"><a href="%s">%s</a></li>', $facebook, 'facebook');
								}

								$google = get_user_meta($user->ID, 'google_profile', true);
								if($google != '')
								{
									printf('<li class="googleplus"><a href="%s">%s</a></li>', $google, 'Google');
								}

								$linkedin = get_user_meta($user->ID, 'linkedin_profile', true);
								if($linkedin != '')
								{
									printf('<li class="linkedin"><a href="%s">%s</a></li>', $linkedin, 'LinkedIn');
								}
							?>
						</ul>
					</div><?php ?>
				</div>
			</div>
			<?php
		}
	?>
</div>
</div>

<?php get_footer(); ?>