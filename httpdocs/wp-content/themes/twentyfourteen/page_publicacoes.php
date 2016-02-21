<?php get_header(); ?>
<?php
/*
Template Name: Publicações
*/
?>

<?php
 
$args= array(
  'cat' => 1
  
);
query_posts($args);
  ?>
<div class="container" style="margin-top:160px;text-align:center">

    <!--<h1>BLOGUE TIAC</h1>-->
        <img src="//transparencia.pt/wp-content/themes/twentyfourteen/assets/img/publicacoes.jpg">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();  ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  	<p><em><?php the_time('l, F jS, Y'); ?></em></p>
  	<hr>
    
    
    <?php endwhile;?>

 


     <?php else: ?>
      <p><?php _e('Sorry, there are no posts.'); ?></p>
    <?php endif; ?>

  </div>
  <div class="span4">

    

  
</div>

<?php get_footer(); ?>
