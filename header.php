<!DOCTYPE HTML>
<html lang=”pt-br”>
<head>

<!-- metas-->
<meta charset="utf-8">
<meta property="og:locale" content="pt_BR" />
<meta http-equiv="content-language" content="pt-br" />
<!-- /metas -->

<!-- title -->
<title><?php titulo_SEO(); ?></title>
<!-- /title -->

<!-- links -->
<link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css?nocache" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Raleway:700' rel='stylesheet' type='text/css'>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- fontes -->
<!-- /links -->

<!--[if IE]>
<script src=”http://html5shiv.googlecode.com/svn/trunk/html5.js”></script>
<![endif]-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- SCRIPTS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/lightbox/js/jquery-1.10.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- SCRIPTS -->

<!-- Arquivos -->
<?php wp_head(); ?>
<!-- /Arquivos -->

<?php if(get_option('Isset_analytics_code')):?>
<!-- Analytics isset painel-->
<?php echo stripslashes(get_option('Isset_analytics_code'));?>

<!-- Analytics isset painel -->
<?php endif; ?>

</head>
<body>
    <header class="main_header">
        <div class="header_topo">
            <div class="header_topo_logo">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="" title="" class="img_responsiva"/>
            </div><!--(header_topo_logo)-->
        </div><!--(header_topo)-->

            <nav class="header_menu">

                <ul class="resp_menu">
                    <?php $args = array(
                        'container'      => '',
                        'fallback_cb'    => '',
                        'echo'           => true,
                        'link_before'    => '',
                        'link_after'     => '',
                        'items_wrap'     => '%3$s',
                        'theme_location' => 'menu_topo',
                    );
                    wp_nav_menu($args); ?>
                </ul>
            </nav><!--(header_menu)-->

    </header><!--(main_header)-->
<div class="content">
