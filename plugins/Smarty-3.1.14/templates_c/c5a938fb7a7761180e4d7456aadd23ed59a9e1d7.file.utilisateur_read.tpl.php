<?php /* Smarty version Smarty-3.1.14, created on 2013-11-27 22:02:13
         compiled from "view\templates\utilisateur_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25071529348260f4244-76612247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5a938fb7a7761180e4d7456aadd23ed59a9e1d7' => 
    array (
      0 => 'view\\templates\\utilisateur_read.tpl',
      1 => 1385584774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25071529348260f4244-76612247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52934826319755_06147738',
  'variables' => 
  array (
    'droits' => 0,
    'item' => 0,
    'linked_items' => 0,
    'links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52934826319755_06147738')) {function content_52934826319755_06147738($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("document_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="menu_left">
				<ul id="buttons">
<?php if (in_array('Utilisateur::update',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../update/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Modifier">Modifier</a></li>
<?php }?>
<?php if (in_array('Utilisateur::delete',$_smarty_tpl->tpl_vars['droits']->value)){?>
					<li><a href="../delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Supprimer">Supprimer</a></li>
<?php }?>
					<li><a href="..">Retour</a></li>
				</ul>
			</div>
			<div id="main">
				<h1>Consultation d'un Utilisateur</h1>
				<form name="frm_utilisateur_read" action=".." method="post">
					<div id="main_items">
						<table>
							<tr>
								<th><label for="nom">nom : </label></th>
								<td id="nom" style="width:169px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['nom'];?>
</td>
							</tr>
							<tr>
								<th><label for="prenom">prenom : </label></th>
								<td id="prenom"><?php echo $_smarty_tpl->tpl_vars['item']->value['prenom'];?>
</td>
							</tr>
							<tr>
								<th><label for="email">email : </label></th>
								<td id="email"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
							</tr>
							<tr>
								<th><label for="login">login : </label></th>
								<td id="login"><?php echo $_smarty_tpl->tpl_vars['item']->value['login'];?>
</td>
							</tr>
							<tr>
								<th><label for="actif">actif : </label></th>
								<td><input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['item']->value['actif']==1){?> checked="checked"<?php }?> disabled="disabled"></td>
							</tr>
						</table>
					</div>
					<div id="main_links">
<?php if (in_array('Affectation::default',$_smarty_tpl->tpl_vars['droits']->value)){?>
						<table>
							<tr>
								<td>
									<fieldset style="margin-top:-7px;">
										<legend>Affectations</legend>
										<table>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['name'] = 'grp_list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['linked_items']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['grp_list']['total']);
?>
											<tr>
												<td>
													<input type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['grp_list']['index']]['id']])&&$_smarty_tpl->tpl_vars['links']->value[$_smarty_tpl->tpl_vars['item']->value['id']][$_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['id']]==true){?> checked="checked"<?php }?> disabled="disabled">
													<label>&nbsp;<?php echo $_smarty_tpl->tpl_vars['linked_items']->value[$_smarty_tpl->getVariable('smarty')->value['section']['grp_list']['index']]['nom'];?>
</label>
												</td>
											</tr>
<?php endfor; endif; ?>
										</table>
									</fieldset>
								</td>
							</tr>
						</table>
<?php }?>
					</div>
					<div id="main_buttons">
						<input type="submit" name="btn_retour" value="Retour"></td>
					</div>
				</form>
				<script type="text/javascript">
					document.forms["frm_utilisateur_read"].elements["btn_retour"].focus();
					document.forms["frm_utilisateur_read"].elements["btn_retour"].select();
				</script>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("document_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>