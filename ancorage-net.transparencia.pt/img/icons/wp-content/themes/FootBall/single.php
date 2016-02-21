<?php get_header ();?>
                    	<div class="leftCol">
                            <!-- loop start-->
							<?php 
                            if (have_posts()) : 
                                $i=1;
                                while (have_posts()) : the_post(); 
									$counter = get_post_custom_values("post-counter");
									if ($counter[0]==""){
										add_post_meta($post->ID, 'post-counter', 1);
									}else{
										$newcounter = $counter[0] + 1;
										delete_post_meta($post->ID, 'post-counter');
										add_post_meta($post->ID, 'post-counter', $newcounter);
									}
                            ?>
                            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                            	<div class="info_wrap">
                                	<div class="dateImage">
                                    	<span class="dt"><?php the_time('d')?></span>
                                        <?php the_time('M')?>
                                    </div>
                                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <div class="post_content">
                                    <ul class="listInfo listInfoFlt" style="margin-bottom:28px;">
                                        <li class="written"><?php the_author_posts_link(); edit_post_link('Edit', ' | ', '');  ?></li>
                                        <li class="licomments"><?php comments_popup_link('N/A', '1', '%');?></li>
                                        <li class="liviews"><?php echo get_post_meta($post->ID, 'post-counter', true);?></li>
                                    </ul>
                                    <div class="clear"></div>
									<?php the_content('Read More')?>
                                    <div class="clear"></div>
                                    <?php if (pubid && $i<=2):?>
                                    <div style="padding:10px 0 0">
									<script type="text/javascript">
                                        google_ad_client = "<?php echo pubid;?>";
                                        google_ad_width = 300;
                                        google_ad_height = 250;
                                        google_ad_format = "300x250_as";
                                        google_ad_type = "text";
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
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <?php
							if (!is_attachment()): comments_template(); endif;
							?>
                            <?php
								$i++; 
								endwhile; 
							else : 
							endif; ?>
                            
                        </div>
						<?php get_sidebar ();?>
<?php get_footer ();?>