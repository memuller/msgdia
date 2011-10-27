<?php
/**
Template Name: Produtos */
get_header(); ?>

<section id="list-post" class="box">
	<div class="content-box">
    <!-- Título da página -->
    <h2><?php the_title(); ?></h2>
    
    <hr />
	
    <!-- Lista de produtos recentes -->
	<ul class="prod-box">
    <?php $my_query = new WP_Query('category_name=produtos');
	      while ($my_query->have_posts()) : $my_query->the_post();
		  $do_not_duplicate = $post->ID; ?>
          
		<li class="item-prod-box" id="post-<?php the_ID(); ?>">
			<!-- Capa do produto -->
            <figure class="prod-thumb">
            <?php if (has_post_thumbnail()) {
                      the_post_thumbnail('produtos', array( 'alt' => get_the_title(), 'class' => 'large')); }	
                  elseif (get_post_meta($post->ID, 'produtos', true) != '') { ?>
                      <img src="<?php echo get_post_meta($post->ID, 'produtos', true); ?>" alt="<?php the_title(); ?>"/>
            <?php } else { ?>
                      <img src="<?php bloginfo('template_directory'); ?>/images/img-prod-padrao.jpg" alt="Ricardo Sá" title="<?php the_title(); ?>">
            <? } ?>
            </figure>
          
          	<!-- Título e Subtítulo do Produto -->
			<hgroup>
            	<h2><?php the_title(); ?></h2>
                <h3><?php prod_subtit($posttitle); ?></h3>
			</hgroup>
            
            
            
             <p id="artigo" >
             	<?php $resumo = get_the_excerpt('','',true); 
						echo substr($resumo, 0, 350); 
						if (strlen($resumo) > 350) 
                        	echo "…"; 
				?>
			</p>
      		
            
            <!-- Div Clear com HR -->				
			<div class="clear"></div>
            <hr />
        </li>
		
       
	<?php endwhile; ?>
    </ul>
	<!-- Fim da Lista de produtos recentes  -->
	<?php include ( TEMPLATEPATH . '/navigation.php' ); ?>
    
    </div>
</section>

<?php get_footer(); ?> 