<?php
/**
 * SEARCH - Página resultado de busca do tema.
 * Contém o Box Resultado de Busca.
 *
 * @package WordPress
 * @subpackage ricardosa
 */
?>
<?php get_header(); ?> 

<!-- Box Resultado da Busca --> 
<section class="box">
	<div class="content-box">
    
    	<!-- Título da Página com Termo pesquisado -->                    
		<h2>Você buscou por  <strong><?php echo strip_tags($s); ?></strong> </h2>
		<!-- Retorno número de artigos encontrados com o termo pesquisado -->
        <h3><?php $search_count = 0; 
	              $search = new WP_Query("s=$s & showposts=-1"); 
		          if($search->have_posts()) : while($search->have_posts()) : $search->the_post(); $search_count++; 
        	      endwhile; 
                  endif; 
                  echo $search_count;
			?> artigo(s) encontrado(s)</h3>
        
   		<hr />

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<ul class="list_post_anim">
        
        	<li class="box-post" id="post-<?php the_ID(); ?>">
					<time><?php the_time('d/m/Y' ) ?>&nbsp;&nbsp;-&nbsp;&nbsp;</time>
                    <h2><a class="link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            </li>
		</ul>
		<?php endwhile; else : ?>
		
		<!-- Mensagem Retorno Caso não encontre nenhum artigo -->				
		<p>Por favor tente de novo seguindo os seguintes critérios</p>
		<ul class="margin-left">
			<li><em>Tente utilizar palavras-chaves diferentes</em></li>            	
            <li><em>Se utilizou um termo muito específico, tente um menos específio, mas relacionado ao conteúdo que está buscando</em></li>            	
            <li><em>Tente utilizar uma palavra com mais de três caracteres</em></li>
            <li><em>Tente procurar dentro de uma categoria</em></li>
		</ul>
        <p><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('description'); ?>">&laquo; clique aqui</a> para retornar a página inicial</p>
        
		<?php endif; ?> 
		<hr/>
        <?php include ( TEMPLATEPATH . '/navigation.php' ); ?>   

	</div> 
</section>

<?php get_footer(); ?>
