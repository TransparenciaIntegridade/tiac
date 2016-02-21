<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
						<div class="post" id="comment-<?php the_ID(); ?>">
                            <div class="post_info">
                                <h2><?php comments_number('<span>No User</span> Review', '<span>1 User</span> Review', '<span>% User</span> Review\'s' );?></h2>
                                <div class="clear"></div>
                            </div>
                            <div class="postdetail">
                                <ol class="commentlist">
                                <?php wp_list_comments(); ?>
                                </ol>
                                <div class="clear"></div>
                            </div>
                        </div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

						<div class="post" id="comment-<?php the_ID(); ?>">

                            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                            <div style="margin:0 0 10px;" id="comments-form">
                                <div class="info_wrap">
                                    <h2 style="float:none; width:100%;"><?php comment_form_title( 'Leave a <span>Reply</span>', 'Leave a <span>Reply</span>' ); ?></h2>
                                    <p>
                                        <?php if ( is_user_logged_in() ) : ?>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a><?php else : ?>Guest<?php endif; ?> and the Server time is <?php echo date("l, F d, Y h:i:s")?>
                                    </p>
                                    <div class="clear"></div>
                                </div>
                                <div class="postdetail">
                                    <div class="commentform">
                                        <div class="body">
                                            <div id="respond">
                                                <div class="cancel-comment-reply"><small><?php cancel_comment_reply_link(); ?></small></div>
                                    
                                                <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
                                                    <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
                                                <?php else : ?>
                                    
                                                    
                                                    <textarea name="comment" id="comment<?php if ( is_user_logged_in() ){echo "2";} ?>" cols="100%" rows="<?php if ( is_user_logged_in() ){echo "6";}else{echo "4" ;} ?>" tabindex="1"></textarea>
                                                    
                                                    <?php do_action('comment_form', $post->ID); ?>
                                                    
                                    
                                                <?php endif; // If registration required and not logged in ?>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <?php if ( !is_user_logged_in() ) : ?>
                                <table width="100%" cellpadding="2" cellspacing="2" border="0" class="tableComment">
                                    <tr>
                                        <td width="33%"><label for="author"><small>Name <?php if ($req) echo "*"; ?></small></label></td>
                                        <td width="34%"><label for="email"><small>E-Mail (private)<?php if ($req) echo "*"; ?></small></label></td>
                                        <td width="33%"><label for="url"><small>Website</small></label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></td>
                                        <td><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> /></td>
                                        <td><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="4" /></td>
                                    </tr>
                                </table>
                                <?php endif; ?>
                                <p>
                                	<input name="submit" type="hidden" tabindex="5" value="Submit Comment" />
                                	<input type="image" class="button" tabindex="6" src="<?php echo blogimages;?>submit.gif" />
                                <?php comment_id_fields(); ?>
                                </p>
                            </div>
                            </form>

                        </div>
<?php endif; // if you delete this the sky will fall on your head ?>
