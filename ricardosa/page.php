<?php
/**
 * PAGE - Página modelo do tema.
 * Contém o Box de modelo de página.
 *
 * @package WordPress
 * @subpackage ricardosa
 */
?>
<?php get_header(); ?> 

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Box Texto da Mensagem--> 
<section class="box">
    <!-- Artigo Completo -->                    
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    
    	<!-- Título da Página -->                    
		<h2><?php the_title(); ?></h2>
        
		<!-- Div Clear com HR -->				
		<div class="clear"></div>
		<hr />
        
        <!-- Texto do Artigo -->
        <p id="artigo" >
			<?php the_content(); ?>
		</p>

        <hr />
                        
	</article>
</section>
<!-- Box Texto da Mensagem--> 

<?php endwhile; endif; ?>

<?php get_footer(); ?> 