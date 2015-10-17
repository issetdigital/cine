<?php get_header();
//session_start();
 $video = get_post_meta($post->ID,'video',true);
 $countimg = 10;
 $imgs = get_post_meta($post->ID,'imgs',true);
 $premium_fotos = get_post_meta($post->ID,'premium_fotos',true);
 
 $categoria = get_the_category();
 $nomeCategoria = $categoria[0]->cat_name;
 $sub = '';
			if(in_category('revistas')){
				$sub = $nomeCategoria.' da ';
			}
   
  /* for($i=1; $i<=50; $i++){
   echo '$img'.$i." = get_post_meta(".'$post->ID'.",'".$i."',true); <br>";
   
   }
   
    for($i=1; $i<=20; $i++){
   echo "http://playboy.edsonzuandotudo.info/revista/playboy/470/$i.jpg<br/>";
   }
   /*wp_list_categories('orderby=name');*/
   
   
 if(isset($_POST['conf'])){
	 $key = $_POST['key'];
	 if($key == "ushaushaufsdf8sd5g6dfg2dfsd6fsdg3sd6g2df6"){
		 $_SESSION['autPremium'] = "Autorizado";
	}else{
		echo "<script>alert('Chave Invalida!')</script>";
	}
}
?>
<div class="left">
   
   <div class="single-entry">
     <div class=""><?php dimox_breadcrumbs() ?></div>
     <?php if (have_posts()): while (have_posts()) : the_post(); $i++; $link = get_Permalink(); ?>
     <div class="single-title">
     	<h1><?php echo $sub; the_title();?></h1>
     </div><!--single-title -->
       
       <div class="single-ex">
       <span class="author">Postado por: <span><?php the_author(''); ?></span></span>
       <span class="date">Data da Postagem: <span><?php the_time("d/m/Y"); ?></span></span>
       <span class="avalie">Visitas <span class="avs"><?php if(function_exists('the_views')) { the_views(); }else{ echo '';} ?></span></span>
       </div><!--single-ex -->
       
      
       <?php if(!empty($video) && in_category('videos')){?>
       <div class="player-video">
          <div class="black-video">
          <?php echo $video;?>
          </div><!-- black video -->
       </div><!-- player-video -->
       		<div class="botoes-sociais">
            <strong>Compartilhar : </strong>
               <div style="width:80%;float:left; height:20px;">
                  <!-- inicio facebook -->
                  <script type="text/javascript"> urlb=window.location.href;document.write
        
                  ("<iframe src='//www.facebook.com/plugins/like.php?href="+urlb+"&amp;layout=button_count&amp;action=like&amp;font=arial' scrolling='no' frameborder='0' allowtransparency='true' style='float:left;width:100px;overflow:hidden;height:25px;'></iframe>");
                  </script>
                  <!-- fim facebook -->
        
                  <!-- inicio twitter-->
                  <script src='//platform.twitter.com/widgets.js' type='text/javascript'></script><div style='float:left;width:90px; overflow:hidden;'>
                  <a class='twitter-share-button' data-via='cinepornvideos' href='//twitter.com/share' rel='nofollow' title='tweet'></a></div>
                  <!-- fim twitter -->
        
                  <!-- inicio +1google -->
                  <script type="text/javascript" src="//apis.google.com/js/plusone.js">{lang: 'pt-BR'}</script>
                  <div style='width:60px;height:21px;float:left;padding-top:1px; overflow:hidden'>
                  <div class="g-plusone" data-size="medium" data-count="true"></div></div>
                  <!-- fim +1google -->
                  
                  <a href="javascript:addFav();" title="Adicionar aos seus Favoritos!" style='background:#FF2291; padding:5px 10px; float:left; padding-top:1px; border-radius:5px; overflow:hidden; color:#FFF; margin:0 0 0 5px;'>
                  <img src="<?php bloginfo('template_directory'); ?>/images/favorite.png" width="15" height="13" alt="Adicionar aos seus Favoritos!" title="Adicionar aos seus Favoritos!" style=" float:left; margin-top:5px;"/> 
                  <span style="float:left; margin-top:4px; margin-left:3px;">Favoritar!</span>
                  </a>
                </div><!-- style -->
            </div><!--botoes-sociais-->
               <div class="content-post">
			   <p><?php if(get_the_content()){ echo "<strong>Descrição: </strong>"; }?><?php the_content();?></p>
               </div><!--content-post -->
               
               <div class="info-extra">
                <li><strong>Postado por:</strong> 
                <span>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( '%s', 'twentyeleven' ), get_the_author() ); ?>
				</a>
                </span>
                </li>
               	
                <li><strong>Categoria:</strong> <?php if (get_the_category()) { the_category(', ');}else{ echo '<a href="http://www.cineporn.tv/videos" title="Ver todos os posts em Videos" rel="category tag">Videos</a>';}?></li>
                <li><strong>Tags</strong>: <span><?php if (get_the_tags()) { the_tags(' ',' , ');}else{ echo '<a href="http://www.cineporn.tv/tag/videos" title="Ver todos os posts em Videos" rel="category tag">Videos</a>';}?></span></li>
               </div><!--info-extra-->
               
       <?php }elseif(!empty($imgs) && in_category('revistas') || $premium_fotos == 1){?>
        <div class="player-photo">
          <div class="black-photo" id="black-photo">
             <?php
			 
			  if($premium_fotos == 1 && isset($_SESSION['autPremium'])){
			  ?>
              <ul>
             <?php $i=1;foreach(explode("\n", $imgs) as $imgsrec): $i++;?>
             <li>
             <a href="<?php echo $imgsrec; ?>" data-lightbox="example-set" title="Galeria - <?php the_title();?> - img: <?php echo $i; ?>">
             <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $imgsrec; ?>&amp;h=582&amp;w=420" alt="Galeria de fotos - <?php the_title();?> Imagem - <?php echo $i; ?>" width="420" height="582" />
             </a>
             </li>
             <?php endforeach;?>
             </ul>
              <?php }elseif(in_category('revistas')){
			 
			  ?>
              <ul>
             <?php $i=1;foreach(explode("\n", $imgs) as $imgsrec): $i++;?>
             <li>
             <a href="<?php echo $imgsrec; ?>" data-lightbox="example-set" title="Galeria - <?php the_title();?> - img: <?php echo $i; ?>">
             <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $imgsrec; ?>&amp;h=582&amp;w=420" alt="Galeria de fotos - <?php the_title();?> Imagem - <?php echo $i; ?>" width="420" height="582" />
             </a>
             </li>
             <?php endforeach;?>
             </ul>
              <?php }else{
			 
			  ?>
              <div class="boxAut">
              <form name="autPremium" method="post" action="" enctype="multipart/form-data">
              	Chave: <input type="text" name="key" /><input type="submit" value="Enviar" name="conf" class="btns" />
              </form>
              </div>
              <?php
			  }
			  
			   ?>
             
             <div class="nextt"></div><!-- nextt-->
             <div class="prevv"></div><!-- prevv-->
              <div class="pager"></div><!--pager -->
          </div><!-- black photo -->
           
           <div class="banners-ads">
           <?php echo stripslashes(get_option('Isset_pubsingle1'));?>
           </div><!--banners-ads -->
           
               <div class="banners-ads">
               <?php echo stripslashes(get_option('Isset_pubsingle1'));?>
               </div><!--banners-ads -->
           
           
       </div><!-- player-photo -->
       
        <div class="botoes-sociais">
            <strong>Compartilhar : </strong>
               <div style="width:80%;float:left; height:20px;">
                  <!-- inicio facebook -->
                  <script type="text/javascript"> urlb=window.location.href;document.write
        
                  ("<iframe src='//www.facebook.com/plugins/like.php?href="+urlb+"&amp;layout=button_count&amp;action=like&amp;font=arial' scrolling='no' frameborder='0' allowtransparency='true' style='float:left;width:100px;overflow:hidden;height:25px;'></iframe>");
                  </script>
                  <!-- fim facebook -->
        
                  <!-- inicio twitter-->
                  <script src='//platform.twitter.com/widgets.js' type='text/javascript'></script><div style='float:left;width:90px; overflow:hidden;'>
                  <a class='twitter-share-button' data-via='cinepornvideos' href='//twitter.com/share' rel='nofollow' title='tweet'></a></div>
                  <!-- fim twitter -->
        
                  <!-- inicio +1google -->
                  <script type="text/javascript" src="//apis.google.com/js/plusone.js">{lang: 'pt-BR'}</script>
                  <div style='width:60px;height:21px;float:left;padding-top:1px; overflow:hidden'>
                  <div class="g-plusone" data-size="medium" data-count="true"></div></div>
                  <!-- fim +1google -->
                  
                  <a href="javascript:addFav();" title="Adicionar aos seus Favoritos!" style='background:#FF2291; padding:5px 10px; float:left; padding-top:1px; border-radius:5px; overflow:hidden; color:#FFF; margin:0 0 0 5px;'>
                  <img src="<?php bloginfo('template_directory'); ?>/images/favorite.png" width="15" height="13" alt="Adicionar aos seus Favoritos!" title="Adicionar aos seus Favoritos!" style=" float:left; margin-top:5px;"/> 
                  <span style="float:left; margin-top:4px; margin-left:3px;">Favoritar!</span>
                  </a>
                </div><!-- style -->
            </div><!--botoes-sociais-->
               <div class="content-post">
			   <p><?php if(get_the_content()){ echo "<strong>Descrição: </strong>"; }?><?php the_content();?></p>
               </div><!--content-post -->
               
               <div class="info-extra">
                <li><strong>Postado por:</strong> 
                <span>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( '%s', 'twentyeleven' ), get_the_author() ); ?>
				</a>
                </span>
                </li>
                <li><strong>Categoria:</strong> <?php if (get_the_category()) { the_category(', ');}else{ echo '<a href="http://www.cineporn.tv/videos" title="Ver todos os posts em Videos" rel="category tag">Videos</a>';}?></li>
                <li><strong>Tags</strong>: <span><?php if (get_the_tags()) { the_tags(' ',' , ');}else{ echo '<a href="http://www.cineporn.tv/tag/videos" title="Ver todos os posts em Videos" rel="category tag">Videos</a>';}?></span></li>
               </div><!--info-extra-->
               
       <?php }else{?>
       <div class="content-post">
       <?php the_content();?>
       </div><!--content-post -->
       <?php }?>
       
       
       <?php endwhile; else:?>
     <center><h2>Ainda não Existe Postagens.. Aguardem</h2></center>
     <?php endif;?>   
     
       <div class="thumbs-rel">
         <?php if(in_category('revistas')):?>
         <div class="revistas">
             
       <div class="revistas-titulo">
          <h2 style="background:none !important; padding-left:0 !important; font-size:25px;">// <span class="tblue">VEJA TAMBEM!</span></h2>
       </div><!-- revistas-titulo-->
       
       <ul>
       <?php query_posts("category_name=revistas&orderby=rand&showposts=".get_option('Isset_limit_thumbsrel').""); if (have_posts()) : ?>
       <?php $i=0; while (have_posts()) : the_post(); if($current_post_id==get_the_ID()) continue; $i++; $currentdate = date('Ymd',mktime(0,0,0,date('m'),date('d'),date('Y')));  
		$postdate = get_the_time('Ymd');
		$capa = get_post_meta($post->ID,'capa',true);
        $capavideo = get_post_meta($post->ID,'capavideo',true); ?>
         <li>
           <?php if ($postdate>=$currentdate-1) {?>
           <div class="new"></div><!--new -->
           <?php }?>
           <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
           <div class="thumb-ph">
           <?php if(!empty($capa)){ ?>
           <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $capa; ?>&amp;h=204&amp;w=162" width="162" height="204" alt="<?php the_title();?>"  />
           <?php }else{?>
           <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo post_imagem();?>&amp;h=204&amp;w=162" width="162" height="204" alt="<?php the_title();?>"   />
           <?php }?>
             <h2 class="thumb-phtitle">
              <a href="<?php the_Permalink()?>" title="<?php the_title();?>"><?php the_title();?></a>
             </h2><!--"thumb-phtitle -->
           </div><!--thumb-ph -->
           </a><!-- a -->
            
            <div class="thumb-views"><?php if(function_exists('the_views')) { the_views(); }else{ echo '';} ?></div><!--thumb-views -->
             <div class="thumb-avalie"><?php if (function_exists ('the_ratings')) {the_ratings ();}else{ echo '';}?></div><!-- thumb avalie -->
         </li>
         <?php endwhile; else:?>
     <center><h2>Ainda não Existe Postagens.. Aguardem</h2></center>
     <?php endif;?>
 <?php wp_reset_query(); ?>
       </ul>
       
   </div><!--revistas -->
         <?php else: ?>
          <div class="videosxx">
       
       <div class="videosxx-titulo">
          <h2 style="background:none !important; padding-left:0 !important; font-size:25px;">// <span class="tblue">VEJA TAMBEM!</span></h2>
       </div><!-- revistas-titulo-->
       
       <ul>
       <?php query_posts("category_name=videos&orderby=rand&showposts=".get_option('Isset_limit_thumbsrel').""); if (have_posts()) : ?>
       <?php $i=0; while (have_posts()) : the_post(); if($current_post_id==get_the_ID()) continue; $i++; $currentdate = date('Ymd',mktime(0,0,0,date('m'),date('d'),date('Y')));  
		$postdate = get_the_time('Ymd');
		$capa = get_post_meta($post->ID,'capa',true);
        $capavideo = get_post_meta($post->ID,'capavideo',true); ?>
         <li>
           <?php if ($postdate>=$currentdate-1) {?>
           <div class="new"></div><!--new -->
           <?php }?>
           <a href="<?php the_Permalink()?>" title="<?php the_title();?>">
           <div class="thumb-mv">
           <?php if(!empty($capavideo)){ ?>
           <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $capavideo; ?>&amp;h=114&amp;w=162" width="162" height="114" alt="<?php the_title();?>" />
           <?php }else{?>
           <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo post_imagem();?>&amp;h=114&amp;w=162" width="162" height="114" alt="<?php the_title();?>" />
           <?php }?>
             <h2 class="thumb-mvtitle">
              <a href="<?php the_Permalink()?>" title="<?php the_title();?>"><?php the_title();?></a>
             </h2><!--"thumb-phtitle -->
           </div><!--thumb-ph -->
           </a><!-- a -->
            
            <div class="thumb-views"><?php if(function_exists('the_views')) { the_views(); }else{ echo '';} ?></div><!--thumb-views -->
             <div class="thumb-avalie"><?php if (function_exists ('the_ratings')) {the_ratings ();}else{ echo '';}?></div><!-- thumb avalie -->
         </li>
         
		 <?php endwhile; else:?>
         <center><h2>Ainda não Existe Postagens.. Aguardem</h2></center>
         <?php endif;?>
          <?php wp_reset_query(); ?>
       </ul>
      
   </div><!--videosxx -->
         <?php endif; ?>
       
       </div><!--thumbs-rel -->
       
       <div class="comentarios-wp">
         <div class="revistas-titulo" style="margin-bottom:10px;">
          <h2 style="background:none !important; padding-left:0 !important; font-size:25px;">// <span class="tblue">DEIXE SEU COMENTARIO!</span></h2>
         </div><!-- revistas-titulo-->
        <?php comments_template();?>
       </div><!--comentarios-fb -->
       
       <div class="comentarios-fb">
         <div class="revistas-titulo">
          <h2 style="background:none !important; padding-left:0 !important; font-size:25px;">// <span class="tblue">DEIXE SEU COMENTARIO PELO FACEBOOK</span></h2>
         </div><!-- revistas-titulo-->
         <div class="fb-comments" data-href="<?php echo $link;?>" data-num-posts="10" data-width="775"></div>
       </div><!--comentarios-fb -->

   </div><!--single-entry -->
   
</div><!--left -->
<?php get_footer();?>