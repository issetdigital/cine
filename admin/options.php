<!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS -->
<!-- scripts / links -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Dosis:400,700" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/admin/style.css" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/admin/js/functions.js"></script>
<!-- scripts / links -->
<?php
ob_start();
if($_REQUEST['saved']):
	echo '<div class="msg"><p><strong>'.$themename.': configurações salvas com sucesso!</strong></p></div>';
elseif($_REQUEST['reset']):
	echo '<div class="msg"><p><strong>'.$themename.': configurações ressetadas com sucesso!</strong></p></div>';
endif;
$i = 0;
?>
<div class="center-margin">
<!-- BOX -->
<div class="isset-wrap">
<!-- TOPO PAINEL -->
<div class="isset-top">

    <!-- TOPO PAINEL LOGO-->
    <a href="http://www.issetdigital.com.br" title="Desenvolvimento de Sites" class="isset-top-logo" target="_blank">
    </a>
    <!-- TOPO PAINEL LOGO-->
    
    <!-- TOPO PAINEL BETA-->
    <div class="versao">
    BETA 2.1
    </div>
    <!-- TOPO PAINEL BETA-->
    
     <!-- TOPO PAINEL REDES-->
     <div class="isset-top-redes">
         <ul>
          <a href="https://www.facebook.com/pages/Isset-Digital/264430943678190" target="_blank" title="Curta-nos Facebook" class="face"></a>
          <a href="http://www.issetdigital.com.br" target="_blank" title="Blog" class="blog"></a>
         </ul>
     </div>
     <!-- TOPO PAINEL REDES-->

</div>
<!-- TOPO PAINEL LOGO -->   
<div class="cont-isset">

     <form method="POST">
		<?php foreach($options as $value):
			switch($value['type']):
				case "open": ?>
                
					<?php 
					break;
				case "close": ?>
                    </div><!--secsessao -->
					<?php
					break;
				case "title": ?>
                
					<?php
					break;
				case "text": ?>
                     <div class="area">
                      <h3><?php echo $value['name'] ?></h3>
                       <input type="text" id="id-<?php echo $i; ?>" name="<?php echo $value['id'] ?>" value="<?php if(get_settings($value['id'])){ echo stripslashes(get_settings($value['id'])); }else{ echo  $value['atv'];} ?>" />
                      <small><?php echo $value['desc'] ?></small>
                     </div>
					<?php
					break;
				case "textarea": ?>
                  <div class="area">
                  <h3 class="textarea"><?php echo $value['name'] ?></h3>
                 <textarea name="<?php echo $value['id'] ?>" cols="" rows=""><?php if(get_settings($value['id'])){ echo stripslashes(get_settings($value['id'])); }else{ echo  $value['atv'];} ?></textarea>
                  <small><?php echo $value['desc'] ?></small>
                 </div>
				 
			    	 <?php break; 
				 case "section": $i++;?>
                 <div style="clear:both !important; padding-top:20px;"></div>
                 <h2 class="config-isset"><?php echo $value['name'] ?> <div class="ver" id="ref-<?php echo $i;?>" title="Abrir Configuracoes / Fechar."></div></h2>
                 <div class="secsessao-<?php echo $i;?>">
					<?php break;
			endswitch;
		endforeach; ?>
	<p class="submit"><input type="submit" value="Salvar configurações" class="btn-true" />
	<input type="hidden" name="action" value="save"  /></p>
	</form>
	<form method="POST">
		<p class="submit"><input type="submit" value="Resetar Configurações" class="btn-reset" />
		<input type="hidden" name="action" value="reset" /></p>
	</form>
     
</div>      
<!-- RODAPE PAINEL LOGO -->
<div class="isset-rodape">
Esse painel foi desenvolvido por <a href="http://www.issetdigital.com.br/" target="_blank">Ariel Tuczynski</a> - Qualquer erro, dúvidas, entre em contato pelo email/msn <a href="http://www.issetdigital.com.br/" target="_blank">arieltuczynski-nd@hotmail.com.</a>
Esse theme ainda está passando por configurações constantes, então qualquer error apresentado por favor entre em contato.
</div>
<!-- RODAPE PAINEL LOGO -->


</div>
<!-- BOX -->
</div><!--center margin -->
<!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS --><!-- THEME OPTIONS -->