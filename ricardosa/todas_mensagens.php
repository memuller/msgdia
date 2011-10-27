<?php
/**
Template Name: Todas as Mensagens */
get_header(); ?> 

<!-- Box Lista de Posts --> 
<section id="list-post" class="box">
    <!-- Artigo Completo -->                    
	<div class="content-box">		
		<?php global $post; $myOffset = 1; //Setei o número 1 para o Offset, exclui o último post mais recente ?>
    	<?php while(have_posts()) : the_post(); ?>
        <!-- Título da Mensagem -->                    
		<h2><?php the_title(); ?></h2>
		
        <hr />

        <ul class="list_post_anim">
            <?php $myposts = get_posts('&category_name=mensagem&numberposts=9999&offset='.$myOffset); // Utilizei o número 9999 pois o -1 conflita com o offset
            	  foreach($myposts as $post) : setup_postdata($post); ?>
        	<li class="box-post" id="post-<?php the_ID(); ?>">
					<time><?php the_time('d/m/Y' ) ?>&nbsp;&nbsp;-&nbsp;&nbsp;</time>
                    <h2><a class="link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                </li>
			<?php endforeach; ?>
		</ul>
            
		<?php endwhile; ?>
        <hr />
        <p><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('description'); ?>">&laquo; clique aqui</a> para retornar a mensagem do dia.</p>
	</div>
</section>
<!-- Fim Box Lista de Posts--> 
    
<?php get_footer(); ?> 
