<?php
/**
 * 404 - Página retorno "Página não Encontrada" do tema.
 *
 * @package WordPress
 * @subpackage ricardosa
 */
?>
<?php get_header(); ?> 

<!-- Box Texto --> 
<section class="box">
	<div class="content-box">
        <!-- Título da Página -->                    
		<h2>Oops! Página não Encontrada</h2>
       	
        <hr/> 
		<p>Desculpe, o documento que você estava procurando foi movido ou não existe mais.</p>
        <ul class="margin-left">
			<li><em>Verifique o endereço da Web para erros de digitação.</em></li>            	
            <li><em>Tente utilizar nossa busca pelo campo acima da página</em></li>
		</ul>
        <p><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('description'); ?>">&laquo; clique aqui</a> para retornar a página inicial</p>

	</div>
</section>
<?php get_footer(); ?>