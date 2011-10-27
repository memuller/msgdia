<?php
/**
 * INDEX - Página inicial do tema.
 * Contém o Box Mensagem do Dia e Box Mensagens Anteriores
 *
 * @package WordPress
 * @subpackage ricardosa
 */
?>
<?php get_header(); ?> 

<?php add_filter('post_limits', 'my_post_limit'); ?>

<!-- Box Mensagem do Dia --> 
<section id="mensagemDia" class="box">
	<!-- Loop busca mensagem mais atual -->
	<?php global $post;
		  $args = array( 'numberposts' => 1, 'category_name'=>'mensagem'  );
		  $myposts = get_posts( $args );
		  foreach( $myposts as $post ) : setup_postdata($post); ?>
	<?php $myPosts .= $post->ID . ","; ?>
	
    <!-- Box Artigo Principal / Mensagem do Dia -->
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<!-- Título da Mensagem -->                    
		<h2><?php the_title(); ?></h2>
		
        <!-- Box Data/Socail/Muda Tamanho do Texto  -->
		<div id="meta-post" class="clear">
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
                <li><?php echo sharing_display(); ?></li>
                <li><a class="rss_post" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" /></a></li>
			</ul>
		
        </div>
		
		<!-- Div Clear com HR -->				
		<div class="clear"></div>
        <!--[if lt IE 7 ]> <br/> <![endif]-->
		<hr />
        
        <!-- Texto do Artigo -->
        <p id="artigo" >
			<?php the_content(); ?>
		</p>
		
        <!-- Botão Comentar / Lêr Comentários -->
        <div class="box-comentariobtn">
        	<a href="<?php the_permalink() ?>/#coment" class="comentariobtn"></a>
		</div>
                        
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
	<!-- Box Artigo Principal / Mensagem do Dia -->
	<?php endforeach; ?>
	<!-- Fim do Loop busca mensagem mais atual -->
</section>
<!-- Fim Box Mensagem do Dia -->
         
<!-- Box Mensagem Anteriores -->
<aside id="mensagemAnt" class="box">
	<div class="content-box">
    	<!-- Título da Página -->
    	<h2>mensagens anteriores</h2>
		<hr />
		<!-- Loop busca 5 mensagens anteriores -->
		<?php global $myOffset;
			  $myOffset = 1;
			  $temp = $wp_query;
			  $wp_query= null;
			  $wp_query = new WP_Query();
			  $wp_query->query('offset='.$myOffset.'&showposts=5'.'&paged='.$paged.'&category_name=mensagem'); ?>
            
			<!-- Lista de Posts anteriores -->
            <ul class="list_post_anim">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<li class="box-post" id="post-<?php the_ID(); ?>">
					<time><?php the_time('d/m/Y' ) ?>&nbsp;&nbsp;-&nbsp;&nbsp;</time>
                    <h2><a class="link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                </li>
                <?php endwhile; ?>
            </ul>
			<!-- Fim Lista de Posts anteriores -->
            
            <hr />
            
            <!-- Links ver todas as imagens anteriores ou todas por data -->
            <div>
            	<span><a href="<?php echo get_option('home'); ?>/todas-as-mensagens/" title="ver todas as mensagens"><?php _e('ver todas as mensagens'); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_option('home'); ?>/arquivos/" title="ver todos os arquivos por data"><?php _e('ver todos os arquivos por data'); ?></a></span>
            </div>
		
		<?php $wp_query = null; $wp_query = $temp;?>
		<!-- Fim do Loop busca 5 mensagens anteriores -->
	</div>
</aside>
<!-- Fim Box Mensagem Anteriores -->

<?php remove_filter('post_limits', 'my_post_limit'); ?>

<?php get_footer(); ?> 