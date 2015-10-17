<?php
// Sidebar right index
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'sidebar-right',
		'description'   => 'Sidebar Right',
        'before_widget' => '<li style="list-style:none;" id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><div class="footer-sidebar"></div>',
		'before_title' => '<div class="widgettitle">',
		'after_title' => '</div><div class="sidctn">',
));

//desativando estilos nativos do WP-PAGENAVI [plugin de paginacao]
add_action('wp_print_styles', 'remover_scripts_descn', 100 );
	function remover_scripts_descn() {
		wp_deregister_style( 'wp-pagenavi' );
// deregister as many stylesheets as you need...
}

/*redirect page to functions*/
if(isset($_GET['activated']) && $pagenow == "themes.php"){
		header('Location: '.admin_url().'admin.php?page=functions.php');
}

function ticat(){
$categoria = get_the_category();
 $nomeCategoria = $categoria[0]->cat_name;
 $sub = '';
			if(in_category('revistas')){
				$sub = $nomeCategoria.' da ';
			}
return $sub;
}

//CANONICAL AUTOMATICO
function seo_isset(){
	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	$url = "http://" . $server . $endereco;
	
	echo '<link rel="canonical" href="'.$url.'" />
';
	
	return;
}
function revValida(){
	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	$url = "http://" . $server . $endereco;
	$ex = explode('/',$url);
	return $ex[3];
}

function geraTitle($i){
	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	$url = "http://" . $server . $endereco;
	
	$remove = explode("/",$url);
	
	echo $remove[$i];
	
}


function faceSocial(){
	
	if (have_posts()): while (have_posts()) : the_post(); $i++; $currentdate = date('Ymd',mktime(0,0,0,date('m'),date('d'),date('Y')));  
	$capa = get_post_meta($post->ID,'capa',true);
    $capavideo = get_post_meta($post->ID,'capavideo',true);
	$img = (!empty($capa) ? $capa : $capavideo);
	
	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	$url = "http://" . $server . $endereco;
	
	$titulo = get_the_title();
	$desc = get_the_content();
	$descricao = lmWord($desc, $words = '150');
	$ds = (!empty($descricao) ? $descricao : 'Vídeos Porno Grátis: Melhores Vídeos de Sexo, Porno Zoofilia e vídeos pornôs de Brasileiras. Mulheres gozando no sexo: Assista vídeo porno grátis.');
	
	$conteudo_post = get_the_content();
	$categoria = get_the_category();
	$nomeCategoria = $categoria[0]->cat_name;
	//<meta property='og:title' content='$titulo' />
	$capass = get_bloginfo('stylesheet_directory').'/images/logo.png';
	
	if(is_single()){
	echo   "<!--(FACE)-->
<meta property='og:locale' content='pt_BR' /> 
<meta property='og:type' content='article' /> 
<meta property='og:description' content='$ds' /> 
<meta property='og:url' content='$url' /> 
<meta property='og:site_name' content='Vídeos Porno Grátis: Melhores Vídeos de Sexo, Porno Zoofilia e vídeos pornôs de Brasileiras. Mulheres gozando no sexo: Assista vídeo porno grátis.' /> 
<meta property='article:section' content='$nomeCategoria' />
";
	}else{
		echo   "<!--(FACE)-->
<meta property='og:locale' content='pt_BR' /> 
<meta property='og:type' content='article' /> 
<meta property='og:description' content='$ds' /> 
<meta property='og:url' content='$url' /> 
<meta property='og:site_name' content='Vídeos Porno Grátis: Melhores Vídeos de Sexo, Porno Zoofilia e vídeos pornôs de Brasileiras. Mulheres gozando no sexo: Assista vídeo porno grátis.' /> 
<meta property='article:section' content='Videos' />
<meta property='og:image' content='$capass'/>
";
		
	}
	
	 endwhile; 
	 
	 else:
        
        endif;
          wp_reset_query(); 
}

function titulo_SEO(){
	
			$categoria = get_the_category();
			$nomeCategoria = $categoria[0]->cat_name;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if (is_home()){
			bloginfo('name');
		}elseif(is_category()){
			 
			if($paged>1){
				single_cat_title(); echo ' | ' ; bloginfo('name'); echo " | Página ".$paged;
			}else{
				single_cat_title(); echo ' | ' ; bloginfo('name');
			}
		}elseif (is_single()){
			if(in_category('revistas')){
			echo $nomeCategoria; echo ' - ';
			}
			single_post_title(); echo ' -  ' ; bloginfo('name');
		}elseif (is_page()){

			if($paged>1){
				bloginfo('name'); echo ': '; single_post_title(); echo " Página ".$paged;
			}else{
				bloginfo('name'); echo ': '; single_post_title();
			}

		}elseif($paged>1){
			wp_title('',true); echo "Página ".$paged;
		}else {
			wp_title('',true);
		}


		
		

}

/*pagenavi*/
function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;
 
  $total = 0; //1 - display the text "Page N of N", 0 - not display
  $a['mid_size'] = 4; //how many links to show on the left and right of the current
  $a['end_size'] = 1; //how many links to show in the beginning and end
  $a['prev_text'] = '&laquo; Anterior'; //text of the "Previous page" link
  $a['next_text'] = 'Próxima &raquo;'; //text of the "Next page" link
 

  if ($total == 1 && $max > 1) $pages = '<span class="pages">Página ' . $current . ' de ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);

}
/*end pagenavi*/
/*****************************
GERA RESUMOS
*****************************/
	function lmWord($string, $words = '100'){
		$string 	= strip_tags($string);
		$count		= strlen($string);
		
		if($count <= $words){
			return $string;	
		}else{
			$strpos = strrpos(substr($string,0,$words),' ');
			return substr($string,0,$strpos).'...';
		}
		
	}

//funcao BREADCRUMB
function dimox_breadcrumbs() {
  $delimiter = '';
  $home ='P&aacute;gina Inicial'; // text for the 'Home' link
  $before = '<span class="currents">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end dimox_breadcrumbs()

// funcao pegar img limpa
function post_imagem() {  global $post, $posts;   $first_img = '';  ob_start();  ob_end_clean();  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);  $first_img = $matches [1] [0];  if(empty($first_img)){     $first_img = get_bloginfo('template_directory')."/images/post.png";  }  return $first_img;}

///////// PAINEL DO THEME
///////// DESENVOLVIDO POR : ARIELTUCZYNSKI
///////// DATE : 20/03/2012

$themename = "Theme Options";
$shortname = "Isset";

/* pega lista de categorias cadastradas para exibir em um dropdown */
$cat_list = get_categories('hide_empty=0&orderby=name');
$getcat = array();
foreach($cat_list as $category):
	$getcat[$category->cat_ID] = $category->cat_name;
endforeach;
$cat_dropdown = array_unshift($getcat, "Escolha uma categoria:");

/* pega lista de paginas cadastradas para exibir em um dropdown */
$pages_list = get_pages();
$getpag = array();
foreach($pages_list as $page):
	$getpag[$page->ID] = $page->post_title;
endforeach;
$pages_dropdown = array_unshift($getpag, "Selecione uma página:");

/* pega lista de todos estilos para exibir em um dropdown */
$styles = array();
if(is_dir(TEMPLATEPATH."/styles/")):
	if($open_dirs = opendir(TEMPLATEPATH."/styles/")):
		while(($style = readdir($open_dirs)) !== FALSE):
			if(stristr($style, ".css") !== FALSE):
				$styles[] = $style;
			endif;
		endwhile;
	endif;
endif;
$style_dropdown = array_unshift($styles, "Selecione um estilo:");

/* opções de configuração do tema */
$options = array(
	array(
		"name"=>"Configurações gerais do Thema",
		"type"=>"title"),
	/// INICIO CONFIGURACOES GERAIS	
	array("name" => "Configurações gerais do Thema",
		"type" => "section"),
	array(
		"type"=>"open"),
	array(
		"name"=>"Descrição do Site",
		"type"=>"text",
		"desc"=>"Insira a Descricao do blog aqui..",
		"id"=>$shortname."_descricao"),
	array(
		"name"=>"Keywords do Site",
		"type"=>"text",
		"desc"=>"Insira as Palavras Chaves do blog aqui..( Separado por Virgulas ',')",
		"id"=>$shortname."_keywords"),
	array(
		"name"=>"Favicon do THEMA",
		"type"=>"text",
		"desc"=>"Insira a url da imagem do favicon.. do Thema",
		"id"=>$shortname."_favicon"),
	array(
		"name"=>"Google Analytics",
		"type"=>"textarea",
		"desc"=>"Insira seu código do Google Analytics aqui.",
		"id"=>$shortname."_analytics_code"),
	array(
		"name"=>"Scripts Footer",
		"type"=>"textarea",
		"desc"=>"Insira js , scripts aqui..",
		"id"=>$shortname."_fscripts"),
	array( "type" => "close"),
	/// END CONFIGURACOES GERAIS

    array( "name" => "Configurações Publicidades",
		"type" => "section"),
    array( "type" => "open"),
	array(
		"name"=>"Anuncio Topo",
		"type"=>"textarea",
		"desc"=>"Insira seu código do banner do anunciante aqui.",
		"id"=>$shortname."_adstop_code"),
	array(
		"name"=>"Anuncio Single 468",
		"type"=>"textarea",
		"desc"=>"Insira seu código do banner do anunciante aqui.",
		"id"=>$shortname."_ads_single"),
	array(
		"name"=>"Footer Pub 01",
		"type"=>"textarea",
		"desc"=>"Insira seu código do banner do anunciante aqui.",
		"id"=>$shortname."_pub1"),
	array(
		"name"=>"Footer Pub 02",
		"type"=>"textarea",
		"desc"=>"Insira seu código do banner do anunciante aqui.",
		"id"=>$shortname."_pub2"),
	array(
		"name"=>"single revistas 01",
		"type"=>"textarea",
		"desc"=>"Insira seu código do banner do anunciante aqui.",
		"id"=>$shortname."_pubsingle1"),
	array(
		"name"=>"single revistas 02",
		"type"=>"textarea",
		"desc"=>"Insira seu código do banner do anunciante aqui.",
		"id"=>$shortname."_pubsingle2"),
	array(
		"type"=>"close"),
		
		///===========================================
	array( "name" => "Configurações de Postagem",
		"type" => "section"),
    array( "type" => "open"),
	array(
		"name"=>"Limit Postagens Revistas PlayBoy DESTAQUE.",
		"type"=>"text",
		"desc"=>"Insira o numero de posts a serem exibidos aqui.",
		"id"=>$shortname."_limit_play"),
	array(
		"name"=>"Limit Postagens Revista Sexy DESTAQUE",
		"type"=>"text",
		"desc"=>"Insira o numero de posts a serem exibidos aqui.",
		"id"=>$shortname."_limit_sexy"),
	array(
		"name"=>"Limit Postagens Videos DESTAQUE",
		"type"=>"text",
		"desc"=>"Insira o numero de posts a serem exibidos aqui.",
		"id"=>$shortname."_limit_videos"),
	array(
		"name"=>"Limit Thumbs Relacionadas",
		"type"=>"text",
		"desc"=>"Insira o numero de posts a serem exibidos aqui.",
		"id"=>$shortname."_limit_thumbsrel"),
	array(
		"type"=>"close")
);

function vision_add_admin(){
	global $themename, $shortname, $options;
	if($_GET['page'] == basename(__FILE__)):
		if('save' == $_REQUEST['action']):
			foreach($options as $value):
				if(isset($_REQUEST[$value['id']])):
					update_option($value['id'],$_REQUEST[$value['id']]);
				else:
					delete_option($value['id']);
				endif;
			endforeach;
			header("Location: themes.php?page=functions.php&saved=true");
			die;
		elseif('reset' == $_REQUEST['action']):
			foreach($options as $value):
				delete_option($value['id']);
			endforeach;
			header("Location: themes.php?page=functions.php&reset=true");
			die;
		endif;
	endif;
	if(!function_exists('wp_list_comments')):
		add_theme_page($themename." Configurações",$themename,'edit_themes',basename(__FILE__),'vision_admin');
	else:
		add_menu_page($themename." Configurações",$themename,'edit_themes',basename(__FILE__),'vision_admin');
	endif;
}

function vision_admin(){
	global $themename, $shortname, $options;
	require(TEMPLATEPATH."/admin/options.php");
}
add_action('admin_menu','vision_add_admin');
require(TEMPLATEPATH."/admin/var.php");

	
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<!--inicio lista-->

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"> 
	<!--inicio comentario campo-->
	<div id="comment-<?php comment_ID(); ?>" class="comentario-campo"> 
		<!--inicio avatar-->
		<div class="comment-author-vcard"><?php echo get_avatar($comment,$size='32',$default='' ); ?> </div>
		<!--fim avatar-->
		
		<?php if ($comment->comment_approved == '0') : ?>
		<em>
		<?php _e('Seu comentário está aguardando autorização.') ?>
		</em> <br />
		<?php endif; ?>
      
		
		<!--inicio meta data-->
		<div class="comment-meta commentmetadata"><?php printf(__('<cite class="fn"><b>%s</b></cite> <span class="says">disse:</span>'), get_comment_author_link()) ?> <br />
			<span class="data-comentario"><?php echo get_comment_date('d/m/y   -   H:i:s'); ?>
			<?php edit_comment_link(__('(Editar)'),'  ','') ?>
			</span> </div>
		<!--fim meta data--> 
		
		<!--inicio conteudo comentario-->
		<div class="commenttext">
			<?php comment_text() ?>
			
			<!--inicio div reply links-->
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
			<!--fim div reply link--> 
		</div>
		<!--fim conteudo comentario--> 
		
	</div>
	<!--fim comentário campo-->
	<div class="clear"></div>
	<?php
        }

?>