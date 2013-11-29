<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 10:30:53
         compiled from "view\templates\session_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152575294cafbf03dd9-62400847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b54dda74efda6285aa452ffae223d754b376389' => 
    array (
      0 => 'view\\templates\\session_read.tpl',
      1 => 1385544503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152575294cafbf03dd9-62400847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5294cafca54cc4_54110061',
  'variables' => 
  array (
    'URI_root' => 0,
    'id' => 0,
    'page' => 0,
    'item' => 0,
    'linked_item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294cafca54cc4_54110061')) {function content_5294cafca54cc4_54110061($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
" title="Accueil">Accueil</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/Session/list/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'une session</h1>
				<form name="frm_session_read" action="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/Session/list/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" method="post">
					<div id="main_items">
						<table>
							<tr>
								<td colspan="2">
									<fieldset>
										<legend>debut</legend>
											<table>
												<tr><th><label for="date_debut">date&nbsp;: </label></th><td id="date_debut"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_debut'];?>
</td></tr>
												<tr><th><label for="heure_debut">heure&nbsp;: </label></th><td id="heure_debut"><?php echo $_smarty_tpl->tpl_vars['item']->value['heure_debut'];?>
</td></tr>
											</table>
									</fieldset>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<fieldset>
										<legend>fin</legend>
											<table>
												<tr><th><label for="date_fin">date&nbsp;: </label></th><td id="date_fin"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_fin'];?>
</td></tr>
												<tr><th><label for="heure_fin">heure&nbsp;: </label></th><td id="heure_fin"><?php echo $_smarty_tpl->tpl_vars['item']->value['heure_fin'];?>
</td></tr>
											</table>
									</fieldset>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<fieldset>
										<legend>utilisateur</legend>
											<table>
												<tr><th><label for="login">login&nbsp;: </label></th><td id="login"><?php echo $_smarty_tpl->tpl_vars['linked_item']->value['login'];?>
</td></tr>
												<tr><th><label for="nom">nom&nbsp;: </label></th><td id="nom"><?php echo $_smarty_tpl->tpl_vars['linked_item']->value['nom'];?>
</td></tr>
												<tr><th><label for="prenom">prenom&nbsp;: </label></th><td id="prenom"><?php echo $_smarty_tpl->tpl_vars['linked_item']->value['prenom'];?>
</td></tr>
												<tr><th><label for="email">email&nbsp;: </label></th><td id="email"><?php echo $_smarty_tpl->tpl_vars['linked_item']->value['email'];?>
</td></tr>
												<tr><th><label for="actif">actif&nbsp;: </label></th><td><input id="actif" type="checkbox"<?php if ($_smarty_tpl->tpl_vars['linked_item']->value['actif']==1){?> checked="checked"<?php }?> disabled="disabled"></td></tr>
											</table>
									</fieldset>
								</td>
							</tr>
							<tr><th><label for="ip">IP&nbsp;: </label></th><td id="ip"><?php echo $_smarty_tpl->tpl_vars['item']->value['ip'];?>
</td></tr>
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_session_read"].elements["btn_retour"].focus();
					document.forms["frm_session_read"].elements["btn_retour"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>