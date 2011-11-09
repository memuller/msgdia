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

<!-- Box Mensagem do Dia --> 
<section id="mensagemDia" class="box">
    <!-- Loop busca mensagem mais atual -->
    <?php 
        global $post;
        $args = array_merge( $wp_query->query, array('post_type'=>'mensagens' )) ;
        $posts = get_posts( $args );
        the_post() ;
    ?>


    
    <!-- Box Artigo Principal / Mensagem do Dia -->
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

        <h2><?php the_title(); ?></h2>
        
        <div id="meta-post" class="clear">

            <div id="changeFont">
                <a href="#" class="aumentaFont"><img src="<?php bloginfo('template_directory'); ?>/images/btn_big_letter.jpg" alt="Aumentar Tamanho do Texto" /></a>
                <a href="#" class="diminuiFont"><img src="<?php bloginfo('template_directory'); ?>/images/btn_small_letter.jpg" alt="Diminuir Tamanho do Texto" /></a>
                <a href="#" class="resetFont"><img src="<?php bloginfo('template_directory'); ?>/images/btn_reset_letter.jpg" alt="Voltar ao Tamanho Original do Texto" /></a>
            </div>
            
            <time><?php the_time('l, j \d\e F \d\e Y \à\s H:i:s a') ?>, <?php echo  time_ago(); ?> &nbsp;&nbsp;|&nbsp;&nbsp;</time>
                      
            <ul class="socialmediapost">
                <li><a href="http://migre.me/compartilhar?msg=<?php the_title();?>+<?php the_permalink();?>" title="Twittar"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Twittar" /></a></li>
                <li><a href="http://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink();?>&t=<?php the_title();?>" title="Curtir"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Curtir" /></a></li>
                <li><g:plusone size="small" count="false" href="<?php the_permalink(); ?>"></g:plusone></li>
                <li><?php echo sharing_display(); ?></li>
                <li><a class="rss_post" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" /></a></li>
            </ul>
        
        </div>
                    
        <div class="clear"></div>
        <!--[if lt IE 7 ]> <br/> <![endif]-->
        <hr />
        
        <p id="artigo" >
            <?php the_content(); ?>
        </p>
        
        <div class="box-comentariobtn">
            <a href="<?php the_permalink() ?>/#coment" class="comentariobtn"></a>
        </div>
                        
        <hr />
                                    
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
    <!-- Fim do Loop busca mensagem mais atual -->
</section>
<!-- Fim Box Mensagem do Dia -->
         
<?php require '_previous_messages_box.php' ?>

<?php get_footer(); ?> 