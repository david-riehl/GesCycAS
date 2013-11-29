<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 14:09:15
         compiled from "view\templates\tentative_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224065295eefb24f469-31714718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8006cd04c928524e9ab268b16c75ace7f2265b8' => 
    array (
      0 => 'view\\templates\\tentative_read.tpl',
      1 => 1385557405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224065295eefb24f469-31714718',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URI_root' => 0,
    'id' => 0,
    'page' => 0,
    'item' => 0,
    'linked_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5295eefba699c5_01360783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5295eefba699c5_01360783')) {function content_5295eefba699c5_01360783($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
" title="Accueil">Accueil</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/Tentative/list/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" title="Retour">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'une Tentative d'ouverture de Session</h1>
				<form name="frm_tentative_read" action="<?php echo $_smarty_tpl->tpl_vars['URI_root']->value;?>
/Tentative/list/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" method="post">
					<div id="main_items">
						<table>
							<tr><th><label for="date">date&nbsp;: </label></th><td id="date"><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td></tr>
							<tr><th><label for="heure">heure&nbsp;: </label></th><td id="heure"><?php echo $_smarty_tpl->tpl_vars['item']->value['heure'];?>
</td></tr>
							<tr><th><label for="ip">IP&nbsp;: </label></th><td id="ip"><?php echo $_smarty_tpl->tpl_vars['item']->value['ip'];?>
</td></tr>
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
						</table>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_retour" value="Retour">
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_tentative_read"].elements["btn_retour"].focus();
					document.forms["frm_tentative_read"].elements["btn_retour"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>