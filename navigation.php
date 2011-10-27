<?php
// loop para adicionar a paginação | se for pagina single adiciona a navegação abaixo
if ( is_singular() and !is_page() ) {  ?>

<!--Inicia a navegação para single.php -->
<div class="navigation single-navigation">
	<div class="prev-posts"><a><?php previous_post_link( '&laquo; %link' ); ?></a></div>
	<div class="next-posts"><a><?php next_post_link('%link &raquo;'); ?></a></div>
</div>

<?php } 
	// loop para adicionar a paginação | se não for pagina single adiciona a navegação abaixo
else { ?>
<!--Inicia a navegação das páginas-->
<div class="navigation">
	<div class="prev-posts"><?php previous_posts_link('Novas Postagens &raquo;') ?></div>
	<div class="next-posts"><?php next_posts_link('&laquo; Postagens Antigas') ?></div>
</div>

<?php }   
?>