<?php
/**
 * COMMENTS - Página comentários do tema.
 * Contém o Box Formulário de envio de Comentário e Box Lista de Comentários.
 *
 * @package WordPress
 * @subpackage ricardosa
 */
?>
<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	  die ('Please do not load this page directly. Thanks!');
	  if ( post_password_required() ) { ?>
		  Este artigo é protegido por senha. Digite a senha para ver os comentários.
	<?php return; } ?>

<?php if ( comments_open() ) : ?>

<!-- Box template dos comentários --> 
<section id="coment" class="box">
    
        <div class="content-box">
        
    	<!-- Título da Mensagem -->                    
		<h2><?php comment_form_title( 'Deixe o seu comentário', 'Deixe seu comentário para %s' ); ?></h2>
        <h3><?php comments_number('Nenhum comentário', '1 comentário', '% comentários' );?> até agora para <?php the_title(); ?></h3>
		<hr />
        
        <!-- Caso eu não queira responder o último comentário, cancelar para aparecer o formulário para um comentário novo -->
        <div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
        </div>
       
        <!-- Caso necessário registro e logar para comentar -->
        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
        <p>Você precisa<a href="<?php echo wp_login_url( get_permalink() ); ?>">logar</a> para postar um comentário.</p>
		
		<?php else : ?>
       	
        <ul>
        <!-- Formulário de comentário -->
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <!-- Caso eu esteja logado -->
            <?php if ( is_user_logged_in() ) : ?>
            
            <!-- Função de mensagem de cumprimento - Bom dia, boa tarde, boa noite ou boa madrugada -->
            <?php function cumprimento($horas){
                  switch($horas){
                   //entre 6 e 12 horas da manhã
                   case ($horas >=6) && ($horas <=12): echo "bom dia, ";
                   break;
                   //entre 12 e 18 horas da tarde
                   case ($horas >12) && ($horas <=18): echo "boa tarde, ";
                   break;
                   //entre 18 e 24 horas da noite
                   case ($horas >18) && ($horas <=24): echo "boa noite, ";
                   break;
                   //entre 0 e 6 horas da madrugada
                   case ($horas <6): echo "boa madrugada, ";
                   break; 
                   }
                }?>
                
            <p><?php $horas = get_the_time('H'); cumprimento($horas); ?><?php echo $user_identity; ?>! Não é você? <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Sair">Sair &raquo;</a></p>
            <?php else : ?>
            
            
            <li><label for="author">Nome <small><?php if ($req) echo "(obrigatório)"; ?></small></label></li>
	        <li><input type="text" name="author" id="author" class="inputext" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></li>
            
           
			<li><label for="email">Email | <small>não se preocupe, não será publicado <?php if ($req) echo "(obrigatório)"; ?></small></label></li>
			<li><input type="text" name="email" id="email" class="inputext" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></li>
            
            
            <li><label for="url">Website</label></li>
            <li><input type="text" name="url" id="url" class="inputext" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" /></li>
            
            <?php endif; ?>
            
            <li><label for="comment">Comentário</label></li>
            <li><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></li>
            
            <li><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar comentário" /></li>
            <?php comment_id_fields(); ?>
            
            <?php do_action('comment_form', $post->ID); ?>
       	</form>
        <!-- Fim Formulário de comentário -->
        </ul>
        <?php endif; // Se necessário registro e não logado ?>
        <!-- Fim Caso necessário registro e logar para comentar -->
		
        
        <hr />
        
        <!-- Loop se existe comentários -->
		<?php if ( have_comments() ) : ?>
		
		
        
        
        
        <div class="navigation">
            <div class="next-posts"><?php previous_comments_link() ?></div>
            <div class="prev-posts"><?php next_comments_link() ?></div>
        </div>
        
        
        
        <ul class="commentlist">
        <?php foreach ($comments as $comment) : ?>
            <!-- template lista comentário -->
            <li class="users<?php echo $commentalt; ?>" id="com-<?php comment_ID() ?>" >
                
                	<!-- Avatar do Autor do Comentário -->		
                    <figure class="comment_avatar">	
                    <?php $pathtotheme = get_bloginfo('stylesheet_directory');
                          if(!empty($comment->comment_author_email)) {
                    	      $md5 = md5($comment->comment_author_email);
                        	  $default = urlencode("$pathtotheme/images/avatar.jpg");
                           echo get_avatar($comment,$size='32');}
                    ?>
                    </figure>
                    <!-- box do comentário -->
               		<div class="comment_content">
                        <!-- Nome do Autor do Comentário -->
                        <h3><?php comment_author_link(); ?> </h3>
                        
                        <!-- Data do comentário -->
                        <time><?php the_time('j \d\e F \d\e Y \à\s H:i:s a') ?>, <?php echo  time_ago(); ?></time>
                        <br />
                        <!-- Comentário -->
                        <?php comment_text() ?>
                        
                        <!-- Mensagem de Aprovação do Comentário -->
                        <?php if ($comment->comment_approved == '0') : ?>
                        <br /><em>Seu comentário está aguardando aprovação!</em>
                        <?php endif; ?>
                	</div>
        	</li>
		<?php endforeach; /* final de cada comentário */ ?>
        </ul>
        
        
        
        <div class="navigation">
            <div class="next-posts"><?php previous_comments_link() ?></div>
            <div class="prev-posts"><?php next_comments_link() ?></div>
        </div>
        
        <?php else : // exibido se não há nenhum comentário até agora ?>
        
			<!-- Se os comentários estão abertos. -->
        	<?php if ( comments_open() ) : ?>
            
			<?php else : // cometários fechados ?>
            
            <div class="comment-close-mensage">
                <p>A opção de comentar este artigo está encerrada. <br />
                Se você tiver uma informação importante para compartilhar, <br />
                você pode sempre <a href="<?php echo get_option('home'); ?>/contato" title="<?php _e('entrar em contato'); ?>"><?php _e('antrar em contato comigo'); ?></a></p>
        	</div> 
                       
            <?php endif; ?>
			<!-- Fim Se os comentários estão abertos. -->
        </div>    
		<?php endif; ?>
		<!-- Fim Loop se existe comentários -->
        
</section>
<!-- Fim Box template dos comentários -->

<?php endif; // Jamais apagar essa linha ?>
