<?php
/* pega as configurações do banco de dados */
global $options;
foreach($options as $value):
	if(get_settings($value['id']) === FALSE):
		$value['id'] = $value['std'];
	else:
		$value['id'] = get_settings($value['id']);
	endif;
endforeach;

/* Pega o id da categoria do portfolio com base em seu nome */
$vs_portfolio_cat = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$vs_portfolio_cat'");

/* Pega o id pagina do blog com base em seu nome */
$vs_blogpage = $wpdb->get_var("SELECT 'ID' FROM $wpdb->posts WHERE post_title='$vs_blogpage' AND post_type='page' LIMIT 1");
?>