<?php 
// JQUERY CALL
function jquery_enqueue() {
    if (!is_admin()) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
        wp_enqueue_script( 'jquery' );
    }
}  
add_action('init', 'jquery_enqueue');	





// POST THUMBNAILS

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true);
	add_image_size( 'mensagem dia',150, 150, true );
	// Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );
}

if ( function_exists( 'add_image_size' ) ) { 
    	add_image_size( 'produtos',150, 150, true );
}



// add ie conditional html5 shim to header
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');


function my_post_limit($limit) {
	global $paged, $myOffset;
	if (empty($paged)) {
			$paged = 1;
	}
	$postperpage = intval(get_option('posts_per_page'));
	$pgstrt = ((intval($paged) -1) * $postperpage) + $myOffset . ', ';
	$limit = 'LIMIT '.$pgstrt.$postperpage;
	return $limit;
}


		
//Exibe Gravatar
function gravatar($rating = false, $size = false, $default = false, $border = false) {
	global $comment;
	$out = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($comment->comment_author_email);
	if($rating && $rating != '')
		$out .= "&amp;rating=".$rating;
	if($size && $size != '')
		$out .="&amp;size=".$size;
	if($default && $default != '')
		$out .= "&amp;default=".urlencode($default);
	if($border && $border != '')
		$out .= "&amp;border=".$border;
	echo $out;
}

//Exibe hora humana "3 minutos atrás"
function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('atr&aacute;s');
}


//Campo Personalizado para acrescentar o Subtítulo dos Produtos
$theme_metaboxes = array(
   "subtitulo" => array (
        "name"      => "subtitulo",
        "default"   => "",
        "label"     => __('Subtítulo - Breve descrição do produto.', 'mytheme'),
        "type"      => "textarea",
        "desc"      => __('O subtítulo aparecerá como uma informação do produto abaixo do título. Ex.: Título do CD, Um CD com 12 canções que falam do amor de Deus.', 'mytheme')
  
    )
);


function custom_fields_box_content() {
	global $post, $theme_metaboxes;
	foreach ($theme_metaboxes as $theme_metabox) {
	$theme_metaboxvalue = get_post_meta($post->ID,$theme_metabox["name"],true);
		if ($theme_metaboxvalue == "" || !isset($theme_metaboxvalue)) {
			$theme_metaboxvalue = $theme_metabox['default'];
		}
	echo "\t".'<p>';
	echo "\t\t".'<label for="'.$theme_metabox['name'].'" style="font-weight:bold; ">'.$theme_metabox['label'].':</label>'."\n";
	echo "\t\t".'<input type="'.$theme_metabox['type'].'" value="'.$theme_metaboxvalue.'" name="'.$theme_metabox["name"].'" id="'.$theme_metabox['name'].'" width="300px"/><br/>'."\n";
	echo "\t\t".$theme_metabox['desc'].'</p>'."\n";
	}
}
 
function custom_fields_box() {
	if ( function_exists('add_meta_box') ) {
	add_meta_box('theme-settings',__('Campo Personalizado', 'mytheme'),'custom_fields_box_content','post','normal','high');
	}
}
 
add_action('admin_menu', 'custom_fields_box');

function custom_fields_insert($pID) {
    global $theme_metaboxes;
    foreach ($theme_metaboxes as $theme_metabox) {
        $var = $theme_metabox["name"];
        if (isset($_POST[$var])) {
            if( get_post_meta( $pID, $theme_metabox["name"] ) == "" )
                add_post_meta($pID, $theme_metabox["name"], $_POST[$var], true );
            elseif($_POST[$var] != get_post_meta($pID, $theme_metabox["name"], true))
                update_post_meta($pID, $theme_metabox["name"], $_POST[$var]);
            elseif($_POST[$var] == "")
                delete_post_meta($pID, $theme_metabox["name"], get_post_meta($pID, $theme_metabox["name"], true));
        }
    }
}
 
add_action('wp_insert_post', 'custom_fields_insert');

function prod_subtit($posttitle) {
   global $post;
   $subtitle = get_post_meta ($post->ID, 'subtitulo', true);
   echo $posttitle;
   if ($subtitle) echo '<h3>'.$subtitle.'</h3>';
   }
   
add_action('after_setup_theme','prod_subtit');

?>