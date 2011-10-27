<?php
/**
 * HEADER - Cabeçalho do tema.
 * Mostra todo o conteúdo de <head> e estrutura do tema até <div id="main">
 *
 * @package WordPress
 * @subpackage ricardosa
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?> > <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html class="no-js" xmlns:fb="http://ogp.me/ns/fb#" <?php language_attributes(); ?>> 
<!--<![endif]-->

<head id="ricardosa" data-template-set="ricardosa" profile="http://gmpg.org/xfn/11">
	
    <!-- // Título da página -->
    <title>
	<?php //if (function_exists('is_tag') && is_tag()) {  single_tag_title("Arquivado em &quot;"); echo '&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Arquivo - '; }  elseif (is_search()) {  echo 'Busca por &quot;'.wp_specialchars($s).'&quot; - '; }  elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; }  elseif (is_404()) { echo 'Não Encontrado - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); }	else { bloginfo('name'); } if ($paged>1) { echo ' - page '. $paged; }?>
    <?php if (function_exists('is_tag') && is_tag()) { echo 'Arquivado em &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Arquivo - '; } elseif (is_search()) { echo 'Busca por &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Página ou Arquivo Não Encontrado - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); } else { bloginfo('name'); } if ($paged>1) { echo ' - page '. $paged; }?>
	</title>
    
    <!-- // General Meta Informations -->
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<!--[if IE 9]>
    	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
    <![endif]-->
    
    <!-- Metadatas -->
    <meta name="author" content="Canção Nova" />
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="Copyright" content="Copyright&copy; &bull; <?php echo date("Y"); ?>. Todos os direitos reservados.">
    <meta name="generator" content="WordPress <?php bloginfo( 'version' ); ?>" />

	<?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
    
    <!-- Dublin Core Metadata -->
    <meta name="DC.title" content="<?php bloginfo( 'name' ); ?>">
    <meta name="DC.subject" content="<?php bloginfo('description'); ?>">
    <meta name="DC.creator" content="Canção Nova • Núcleo de Design em Tecnologia da Informação">

    <meta name="title" content="<?php if (function_exists('is_tag') && is_tag()) { echo 'Arquivado em &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Arquivo - '; } elseif (is_search()) { echo 'Busca por &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Página ou Arquivo Não Encontrado - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); } else { bloginfo('name'); } if ($paged>1) { echo ' - page '. $paged; }?>">
	
    <!-- // RSS, Atom e Pingback -->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <!-- // Carrega Javascript -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/modernizr-1.7.min.js"></script>

    <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/javascripts/selectivizr.js"></script>
    <![endif]-->
	
    <!--[if IE 6]>
		<script src="<?php echo get_template_directory_uri(); ?>/javascripts/DD_belatedPNG.js" type="text/javascript"></script>
		<script>DD_belatedPNG.fix('img *');</script>
    <![endif]--> 
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); // carrega o javascript necessários para comentários ?>
	<?php wp_head(); ?>
    
    <!-- // Carrega Styles -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <!--[if IE 7 ]>    
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie7.css" /> 
    <![endif]-->


    <!-- // Icones do site -->
	<link type="text/css" rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.gif" />
	<link type="text/css" rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />

</head>

<body <?php body_class(); ?>>

    <div id="fb-root"></div>
		<script type="text/javascript">
        (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }
        (document, 'script', 'facebook-jssdk'));
	</script>
<!-- Abre #page-wrapper -->	
<div id="page-wrapper">

	<!-- Header -->
	<header id="header" class="clear">
		<!-- H1 - Logotipo -->
        <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
        
        <div id="content-top">
            <!-- Nav - Menu Principal -->
            <nav>
                <ul id="navPro">
                    <li><a class="inactive" href="<?php echo get_option('home'); ?>"><?php _e('mensagem do dia'); ?></a></li>
                    <li><a class="inactive" href="<?php echo get_option('home'); ?>/release"><?php _e('release'); ?></a></li>
                    <li><a class="inactive" href="<?php echo get_option('home'); ?>/programas"><?php _e('tv & rádio'); ?></a></li>
                    <li><a class="inactive" href="<?php echo get_option('home'); ?>/ultimos-produtos"><?php _e('últimos produtos'); ?></a></li>
                    <li><a class="inactive" href="<?php echo get_option('home'); ?>/contato"><?php _e('contato'); ?></a></li>
                </ul>
            </nav>
            
            <!-- Search - Campo de Busca-->
            <?php get_search_form(); ?>
		</div>
        
	</header>
	<!-- Fim Header -->
