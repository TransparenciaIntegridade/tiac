<?php get_header(); ?>
<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args= array(
  'cat' => 6,
  'paged' => $paged
);
query_posts($args);
  ?>
<div class="container" style="margin-top:160px;text-align:center">

    <!--<h1>BLOGUE TIAC</h1>-->
    <img src="//transparencia.pt/wp-content/themes/wpbootstrap/assets/img/noticias_header.jpg">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();  ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  	<p><em><?php the_time('l, F jS, Y'); ?></em></p>
  	<hr>
    
    
    <?php endwhile;?>

 <div class="pagination">
        <?php previous_posts_link('< previous page', 0); ?>
        <?php next_posts_link('next page >', 0); ?>
        </div><!--End pagination-->


     <?php else: ?>
      <p><?php _e('Sorry, there are no posts.'); ?></p>
    <?php endif; ?>

  </div>
  <div class="span4">

    

  
</div>





<?php get_footer(); ?>