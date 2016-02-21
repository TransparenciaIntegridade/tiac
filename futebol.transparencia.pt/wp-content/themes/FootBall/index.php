<?php get_header ();?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    	<div class="leftCol">
                        	<div class="mainHeading">
                            	<?php /* If this is a home page */ if (is_home()) { ?>
                                <?php /* If this is a category archive */ }elseif (is_category()) { ?>
                                <h3><?php single_cat_title(); ?></h3>
                                <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                                <h3>Posts Tagged <span>&#8216;<?php single_tag_title(); ?>&#8217;</span></h3>
                                <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                                <h3>Archive for <span><?php the_time('F jS, Y'); ?></span></h3>
                                <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                                <h3>Archive for <span><?php the_time('F, Y'); ?></span></h3>
                                <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                                <h3>Archive for <span><?php the_time('Y'); ?></span></h2>
                                <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                                <h3>Author's <span>Archive</span></h2>
                                <?php /* If this is an author archive */ } elseif (is_search()) { ?>
                                <h3>Search Results for <span><?php the_search_query();?></span></h3>
                                <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                                <h3>Arquivos <span>Blog</span></h3>
                                <?php } ?>
                            </div>
                            
                            <!-- loop start-->
							<?php 
                            if (have_posts()) : 
                                $i=1;
                                while (have_posts()) : the_post(); 
                            ?>
                            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                                <div>
                                    <?php the_content('Saber mais')?>  
                                </div>
                            </div>
                            <?php
								$i++; 
								endwhile; 
							?>                        
                            <?php
							else : 
							endif; ?>
                            
                        </div>
						<?php /*get_sidebar ();*/?>
<?php get_footer ();?>