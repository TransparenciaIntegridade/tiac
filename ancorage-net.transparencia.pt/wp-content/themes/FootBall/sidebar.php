                        <div class="rightCol">
                        	<div class="loginbox">
                            
                            	<?php if (!is_user_logged_in()):?>
                                <form name="loginform" id="loginform" action="<?php bloginfo("url")?>/wp-login.php" method="post">
                                <input type="hidden" name="wp-submit" id="wp-submit" value="Log In" tabindex="100"/>
                                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI'];?>"/>
                                <input type="hidden" name="testcookie" value="1"/>
                            	<h3>Login</h3>
                                <div class="inp">
                                	<input type="text" value="" name="log" class="input" />
                                    <input type="password" value="" name="pwd" class="password" />
                                </div>
                                <div class="inplinks">
                                	<div class="rchek"><input type="checkbox" value="forever" id="rememberme" name="rememberme" class="cbk" /> <label>Remember me</label></div>
                                    <div class="rlink"><a href="<?php echo wp_lostpassword_url( $_SERVER['REQUEST_URI'] ); ?> " class="orng"><strong>Reset Password</strong></a></div>
                                	<div class="clear"></div>
                                </div>
                                <div class="btns">
                                	<a href="<?php bloginfo("url")?>/wp-login.php?action=register" class="bam" style="display:block; width:196px;"><img src="<?php echo blogimages;?>become-a-member.gif" alt="Become a Member" /></a>
                                    <input type="image" class="sin" src="<?php echo blogimages;?>sign-in.gif" />
                                    <div class="clear"></div>
                                </div>
                                </form>
                                <?php else:
									global $current_user;
									get_currentuserinfo();
									$user = new WP_User( $current_user->ID );
									if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
										foreach ( $user->roles as $role )
											$listedRole = $role;
									}

								?>
                                <h3>Welcome</h3>
                                <div class="widget">
                                    <div class="widget_body">
                                        <p><strong>Full Name:</strong> <?php echo $current_user->display_name?></p>
                                        <p><strong>Email:</strong> <?php echo $current_user->user_email?></p>
                                        <p><strong>Role:</strong> <span style="text-transform:capitalize"><?php echo $listedRole?></span></p>
                                        <p><strong>Total Posts:</strong> <?php echo get_usernumposts( $current_user->ID );?></p>
                                    </div>
                                </div>
                                <?php endif;?>
                            </div>
                            <div class="rc2Cols" id="rc2Cols">
                            	<div class="rc2Cols1">
                                	<?php 
									$args = array('before_widget' => '<div id="widget_" class="widget">', 'after_widget'  => '<div class="clear"></div></div></div>', 'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>', 'after_title'   => '</h3></div><div class="widget_body">');
									if ( !dynamic_sidebar('Sidebar') ) : 
									 	the_widget('WP_Widget_Categories', 'hierarchical=true&count=1', array('before_widget' => '<div id="widget_categories" class="widget widget_categories">', 'after_widget'  => '<div class="clear"></div></div></div>', 'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>', 'after_title'   => '</h3></div><div class="widget_body">'));
										the_widget('WP_Widget_Archives', 'type=monthly', array('before_widget' => '<div id="widget_archive" class="widget widget_archive">', 'after_widget'  => '<div class="clear"></div></div></div>', 'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>', 'after_title'   => '</h3></div><div class="widget_body">'));
										the_widget('WP_Widget_Links', '', array('before_widget' => '<div id="widget_links" class="widget widget_links">', 'after_widget'  => '<div class="clear"></div></div></div>', 'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>', 'after_title'   => '</h3></div><div class="widget_body">'));
									endif; ?>
                                </div>
                                <div class="rc2Cols2">
                                    <div class="clear"></div>
                                    <?php if (pubid):?>
                                    <div style="padding:10px 0 0">
                                    <script type="text/javascript">
                                        google_ad_client = "<?php echo pubid;?>";
                                        google_ad_width = 160;
                                        google_ad_height = 600;
                                        google_ad_format = "160x600_as";
                                        google_ad_type = "image";
                                        google_ad_channel = "";
                                        google_color_border = "FFFFFF";
                                        google_color_bg = "FFFFFF";
                                        google_color_link = "C42326";
                                        google_color_text = "424242";
                                        google_color_url = "398CC0";
                                    </script>
                                    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
                                    </div>
                                    <?php endif;?>
                                	<?php if ( !dynamic_sidebar('Sidebar2') ) : 
										 the_widget('WP_Widget_Recent_Comments', array('title'=>__('Recent Comments'), "number"=>5), array('before_widget' => '<div id="widget_rec" class="widget widget_recentcomments">', 'after_widget'  => '<div class="clear"></div></div></div>', 'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>', 'after_title'   => '</h3></div><div class="widget_body">')); 
										 the_widget('WP_Widget_Tag_Cloud', array('title'=>__('Tag Clouds')), array('before_widget' => '<div id="widget_tags" class="widget widget_tag_clouds">', 'after_widget'  => '<div class="clear"></div></div></div>', 'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>', 'after_title'   => '</h3></div><div class="widget_body">'));
										 the_widget('WP_Widget_Meta', array('title'=>__('Meta')), array('before_widget' => '<div id="widget_meta" class="widget widget_meta">', 'after_widget'  => '<div class="clear"></div></div></div>', 'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>', 'after_title'   => '</h3></div><div class="widget_body">'));
									endif; ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
