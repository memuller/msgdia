<?php
/**
 * SINGLE - Página artigo completo do tema.
 * Contém o Box Artigo completo, Box de formulário de comentários, Box de comentários (caso haja comentários) e Box Mensagens Anteriores
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
    
    	<!-- Título da Mensagem -->                    
		<h2><?php the_title(); ?></h2>
		
        <!-- Box Data/Socail/Muda Tamanho do Texto  -->
		<div id="meta-post">
        	<!-- Box Muda Tamanho do Texto  -->
            <div id="changeFont">
            	<a href="#" class="aumentaFont"><img src="<?php bloginfo('template_directory'); ?>/images/btn_big_letter.jpg" alt="Aumentar Tamanho do Texto" /></a>
                <a href="#" class="diminuiFont"><img src="<?php bloginfo('template_directory'); ?>/images/btn_small_letter.jpg" alt="Diminuir Tamanho do Texto" /></a>
                <a href="#" class="resetFont"><img src="<?php bloginfo('template_directory'); ?>/images/btn_reset_letter.jpg" alt="Voltar ao Tamanho Original do Texto" /></a>
			</div>
			
            <!-- Data do Artigo -->
			<time><?php the_time('l, j \d\e F \d\e Y \à\s H:i:s a') ?>, <?php echo  time_ago(); ?> &nbsp;&nbsp;|&nbsp;&nbsp;</time>
           
             <!-- Compartilhar o Post - Social -->             
			<ul class="socialmediapost">
                <li><a href="http://migre.me/compartilhar?msg=<?php the_title();?>+<?php the_permalink();?>" title="Twittar"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Twittar" /></a></li>
                <li><a href="http://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink();?>&t=<?php the_title();?>" title="Curtir"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Curtir" /></a></li>
                <li><g:plusone size="small" count="false" href="<?php the_permalink(); ?>"></g:plusone></li>
                <li><a class="rss_post" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" /></a></li>
			</ul>
		
        </div>
		
		<!-- Div Clear com HR -->				
		<div class="clear"></div>
		<hr />
        <!-- Texto do Artigo -->
        <p id="artigo" >
			<?php the_content(); ?>
		</p>

        <hr />
                        
        <!-- Curtir o Post - Social -->             
        <div class="socialcurtirpost">
			<ul class="social buttons">
				<li>
                	<fb:like href="<?php the_permalink() ?>" send="true" layout="button_count" width="90" show_faces="false" font="lucida grande"></fb:like>
				</li>
                
				<li>
                	<a href="http://twitter.com/share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="ricardosa" class="twitter-share-button">Tweet</a>
                    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                </li>
				
                <li>
                 
                    <g:plusone size="medium" href="<?php the_permalink();?>"  callback="plusone_vote"></g:plusone>
                </li>
			</ul>
		</div>
                        
		                
                              
	</article>
</section>
<!-- Box Texto da Mensagem--> 

<?php endwhile; endif; ?>

<!-- Template dos comentários -->
<?php comments_template(); ?>
<!-- // Template dos comentários -->

<?php
	$current_post = $post ;
	$posts = query_posts(array('post_type'=>'mensagens' )) ;
	require '_previous_messages_box.php' ;
?>

<?php get_footer(); ?> 