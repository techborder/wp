<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'butterbelly'); ?></p>
    <?php
    return;
}
?>
<!-- You can start editing here. -->
<div id="commentsbox">
    <?php if (have_comments()) : ?>
        <h2 id="comments">
            <?php comments_number('No Responses', 'One Response', '% Responses'); ?>
            so far.</h2>
        <ol class="commentlist">
            <?php wp_list_comments(array('avatar_size' => 70)); ?>
        </ol>
        <div class="comment-nav">
            <div class="alignleft">
                <?php previous_comments_link() ?>
            </div>
            <div class="alignright">
                <?php next_comments_link() ?>
            </div>
        </div>
    <?php else : // this is displayed if there are no comments so far ?>
        <?php if (comments_open()) : ?>
            <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed  ?>
            <!-- If comments are closed. -->
            <p class="nocomments"><?php _e('Comments are closed.', 'butterbelly'); ?></p>
        <?php endif; ?>
    <?php endif; ?>	
    <?php if (comments_open()) : ?>
        <div class="commentform_wrapper">
            <div id="comment-form">
                <?php comment_form(); ?>
            </div>
        </div>
    <?php endif; // if you delete this the sky will fall on your head  ?>
</div>
