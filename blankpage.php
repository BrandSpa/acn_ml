<?php
/*
Template Name: Blank page
*/
?>


<?php get_header('blank') ?>

<div class="container" >

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_content() ?>
    
  <?php endwhile; else : ?>
    <h1>
    <?php echo gett('404') ?>
    </h1>
  <?php endif; ?>
</div>


<?php get_footer('blank') ?>
