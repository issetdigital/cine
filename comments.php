<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Por favor, não carregue essa página diretamente. Obrigado');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Esse artigo está protegido por senha. Insira a senha para poder visualizar os comentários.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments"></h3>

		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>


	<ol class="commentlist">
	<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ol>


		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comentário Fechado.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>Você precisa estar <a href="<?php echo wp_login_url( get_permalink() ); ?>">logado</a> para postar uma resposta.</p>
<?php else : ?>

<div class="forms">

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<div class="clear"></div>
<div id="desceComents"></div>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p class="links-comentario">Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> - <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Sair dessa conta">Sair da conta »</a></p>

<?php else : ?>

<p class="input-small"><small>Nome:</small><br><input type="text" name="author" id="author" value="" size="22" tabindex="1" /></p>

<p class="input-small"><small>Email:</small><br><input type="text" name="email" id="email" value="" size="22" tabindex="2" /></p>

<p class="input-small"><small>Site/Blog:</small><br><input type="text" name="url" id="url" value="" size="22" tabindex="3" /></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="image" src="<?php bloginfo('template_directory');?>/images/enviar.png" id="submit" tabindex="5" value="Enviar" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

</div>


<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
