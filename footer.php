<?php
/**
 * FOOTER - Rodapé do tema.
 * Fechamento do conteúdo <div id="main"> e conteúdo do <footer> 
 *
 * @package WordPress
 * @subpackage ricardosa
 */
?>
    <!-- Footer - Rodapé -->
    <footer class="clear">
		
        <h3>ricardo sá <span>&bull; perfil</span></h3>
        
        <div class="social-foot">
            <ul>
                <li class="ico-facebook"><a href="https://www.facebook.com/ricardosacn" class="icorodape" title="Siga-me no Facebook">facebook</a></li>
                <li class="ico-twitter"><a href="http://twitter.com/ricardosacn" class="icorodape" title="Siga-me no Twitter">twitter</a></li>
                <li class="ico-gentedefe"><a href="http://gentedefe.com/groups/namoro-cristao" class="icorodape" title="Namoro Cristão">gente de fé</a></li>
                <li class="ico-blog"><a href="http://blog.cancaonova.com/ricardosa/" class="icorodape" title="Blog Ricardo Sá">blog</a></li>
                <li class="ico-rss"><a href="<?php bloginfo('rss2_url'); ?>" class="icorodape" title="rss">rss</a></li>
     
			</ul>
            <span><a href="#" class="scroll-top" title="ir para o topo">ir para o topo &uarr;</a></span>
            
		</div>
        
        <address class="menucn-foot">
            
            <small>&copy;&nbsp;<?php echo the_time("Y"); ?> Ricardo Sá Mensagem do dia todos os direitos reservados</small >
            
            <br />
            
            <ul>
            	<li><a href="http://www.ricardosa.com/" title="Home Ricardo Sá">home</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;</li>
                <li><a href="http://www.cancaonova.com/" title="Canção Nova">cancaonova.com</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;</li>
                <li><a href="http://www.cancaonova.com/portal/canais/pejonas/" title="Página do Fundador">fundador</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;</li>
                <li><a href="http://shopping.cancaonova.com/" title="Shopping Canção Nova">shopping.cancaonova.com</a></li>
			</ul>
            
		</address>
	
    </footer>
	<!-- // Footer - Rodapé -->

</div>
<!-- Abre #page-wrapper -->	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.color.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/easing.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.tipTip.minified.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/functions.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: 'pt-BR'}</script>

<?php wp_footer(); ?>
</body>
</html>