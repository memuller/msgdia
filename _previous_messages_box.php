<!-- Box Mensagem Anteriores -->
<aside id="mensagemAnt" class="box">
    <div class="content-box">
        <h2>mensagens anteriores</h2>
        <hr />
        <ul class="list_post_anim">
            <?php 
                foreach ($posts as $i => $post) {
                    if( ! isset($current_post) ){
                        if($i == 0) { continue ; }
                    } else if ($post->ID == $current_post->ID){
                       continue ; 
                    }
                    setup_postdata($posts[$i]) ; 
            ?>              
                <li class="box-post" id="post-<?php the_ID(); ?>">
                    <time><?php the_time('d/m/Y' ) ?>&nbsp;&nbsp;-&nbsp;&nbsp;</time>
                    <h2><a class="link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                </li>
            <?php } ?>
            </ul>
            <hr />
            
            <!-- Links ver todas as imagens anteriores ou todas por data -->
            <div>
                <span><a href="<?php echo get_option('home'); ?>/todas-as-mensagens/" title="ver todas as mensagens"><?php _e('ver todas as mensagens'); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_option('home'); ?>/arquivos/" title="ver todos os arquivos por data"><?php _e('ver todos os arquivos por data'); ?></a></span>
            </div>
    </div>
</aside>